<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Carbon\Carbon;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Resources\topic\TopicRootResource;
use App\Http\Requests\Admin\Topic\StoreTopicRequest;
use App\Http\Requests\Admin\Topic\UpdateTopicRequest;

class TopicController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('admin.topic.index', [
			'title' => 'Topics',
			'breadcrumb' => array(
				array('title' => 'Topics', 'link' => route('admin.topic.index'))
			)
		]);
	}

	/**
	 * Get ajax data listing.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRootData(Request $request)
	{
		$topics = Topic::orderBy('name', 'ASC')->get();
		$resp = TopicRootResource::collection($topics);
		echo json_encode($resp);
	}

	/**
	 * Get ajax data listing.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function updateOrCreateTopic(StoreTopicRequest $request)
	{
		try {
			$requestArray = $request->safe()->all();
			$parent = 0;
			if ($requestArray['parent_id'] != '#') {
				$parent = $requestArray['parent_id'];
			}
			$requestArray['name'] = Str::title($requestArray['name']);
			$requestArray['slug'] = Str::slug($requestArray['name']);
			$requestArray['parent_id'] = $parent;

			$topic = Topic::updateOrCreate(['id' => $request->id], $requestArray);
			return response()->json([
				'id' =>  $topic->id,
				'status' =>  true,
				'message' =>  __('messages.admin.topic_create_or_update_succ')
			]);
		} catch (Throwable $exception) {
			return response()->json([
				'status' =>  false,
				'message' => $exception->getMessage()
			]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function deleteTopic(Request $request)
	{
		try {
			Topic::where('id', $request->id)->orwhere('parent_id', $request->id)->get()->each(function ($product, $key) {
				$product->delete();
			});;
			return response()->json([
				'status' => true,
				'message' => __('messages.admin.topic_deleted_succ'),
			]);
		} catch (Throwable $exception) {
			return response()->json([
				'status' => false,
				'message' => $exception->getMessage(),
			]);
		}
	}
}
