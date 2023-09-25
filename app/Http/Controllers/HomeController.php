<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Cms;
use App\Models\User;
use App\Models\TopicUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\AddTopicRequest;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('home');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function addTopics(AddTopicRequest $request)
	{
		try {
			$user = User::find(Auth::user()->id);
			$requestArray = $request->safe()->all();
			foreach ($requestArray['topics'] as $topic) {
				TopicUser::updateOrCreate(['user_id' => $user->id, 'topic_id' => $topic], ['user_id' => $user->id, 'topic_id' => $topic]);
			}
			$user->email_verified_at = Carbon::now();
			$user->save();
			return response()->json([
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


	public function updateTopics(AddTopicRequest $request)
	{
		try {
			$user = User::find(Auth::user()->id);
			$requestArray = $request->safe()->all();
			TopicUser::whereNotIn('topic_id', $requestArray['topics'])->delete();
			foreach ($requestArray['topics'] as $topic) {
				TopicUser::updateOrCreate(['user_id' => $user->id, 'topic_id' => $topic], ['user_id' => $user->id, 'topic_id' => $topic]);
			}
			return response()->json([
				'data' => $user->topics,
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
}
