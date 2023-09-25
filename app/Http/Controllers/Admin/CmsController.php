<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Carbon\Carbon;
use App\Models\Cms;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\ImageUploadTrait;
use App\Http\Requests\StoreCmsRequest;
use App\Http\Requests\UpdateCmsRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CmsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('admin.cms.index', [
			'title' => 'CMS List',
			'breadcrumb' => array(
				array('title' => 'CMS', 'link' => '')
			)
		]);
	}

	/**
	 * Get ajax data listing.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function listData(Request $request)
	{
		$columns = array(
			0 => 'id',
			1 => 'name',
			2 => 'slug',
			4 => 'status',
			5 => 'created_at'
		);
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		$cmsData = Cms::orderBy($order, $dir);
		$totalData = $cmsData->count();

		$totalFiltered = $totalData;

		if (!empty($request->input('search.value'))) {
			$search = $request->input('search.value');
			$cmsData = $cmsData->where(function ($query) use ($search) {
				$query->where('name', 'LIKE', "%{$search}%")
					->orWhere('slug', 'LIKE', "%{$search}%");
			});

			$totalFiltered =  $cmsData->count();
		}

		$cmsData =  $cmsData->offset($start)
			->limit($limit)
			->get();
		$data = array();
		if (!empty($cmsData)) {
			$sr_no = '1';
			foreach ($cmsData as $cms) {
				$nestedData['id'] = $cms->id;
				$nestedData['srno'] = $sr_no;
				$nestedData['name'] = $cms->name;
				$nestedData['slug'] = $cms->slug;
				$nestedData['status'] = $cms->status;
				$nestedData['created_at'] = Carbon::parse($cms->created_at)->format(config('app.date_format'));
				$nestedData['edit_url'] = route('admin.cms.edit', $cms->hashId);
				$nestedData['delete_url'] = route('admin.cms.destroy', $cms->hashId);
				$nestedData['status_url'] = route('admin.cms.status.change', $cms->hashId);
				$nestedData['show_url'] = route('cms.view', $cms->slug);
				$nestedData['actions'] = $cms->hashId;
				$data[] = $nestedData;
				$sr_no++;
			}
		}

		$json_data = array(
			"draw"            => intval($request->input('draw')),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"            => $data
		);

		echo json_encode($json_data);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.cms.create', [
			'title' => 'CMS Create',
			'breadcrumb' => array(
				array('title' => 'CMS', 'link' => route('admin.cms.index')),
				array('title' => 'CMS Create', 'link' => '')
			)
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreCmsRequest $request)
	{
		try {
			$userArray = $request->safe()->all();
			$userArray['name'] = Str::title($userArray['name']);
			$userArray['slug'] = Str::slug($userArray['name']);
			// dd($userArray);
			Cms::create($userArray);
			Session::flash('success', __('messages.admin.cms_created_succ'));
			return redirect(route('admin.cms.index'));
		} catch (Throwable $exception) {
			Session::flash('error', $exception->getMessage());
			return redirect(route('admin.cms.index'));
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Cms $cms)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($id, Request $request)
	{
		$cms = Cms::findByHashId($id);
		return view('admin.cms.edit', [
			'title' => 'CMS Edit',
			'cms' => $cms,
			'breadcrumb' => array(
				array('title' => 'CMS', 'link' => route('admin.cms.index')),
				array('title' => 'CMS Edit', 'link' => '')
			)
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateCmsRequest $request, $id)
	{
		$cms = Cms::findByHashId($id);
		try {
			$cmsArray = $request->safe()->all();
			$cmsArray['name'] = Str::title($cmsArray['name']);
			$cmsArray['slug'] = Str::slug($cmsArray['name']);
			$cms->update($cmsArray);
			Session::flash('success', __('messages.admin.cms_updated_succ'));
			return redirect(route('admin.cms.index'));
		} catch (Throwable $exception) {
			Session::flash('error', $exception->getMessage());
			return redirect(route('admin.cms.index'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id, Request $request)
	{
		try {
			$cms = Cms::findByHashId($id);
			if ($cms->delete()) {
				return response()->json([
					'state' => true,
					'message' => __('messages.admin.cms_deleted_succ'),
				]);
			}
		} catch (Throwable $exception) {
			return response()->json([
				'state' => false,
				'message' => $exception->getMessage(),
			]);
		}
	}

	/**
	 * multiple Remove the specified resource from storage.
	 */
	public function multipleDestroy(Request $request)
	{
		try {
			$cms = Cms::whereIn('id', $request->ids);
			$cms->delete();
			return response()->json([
				'state' => true,
				'message' => __('messages.admin.cms_deleted_succ'),
			]);
		} catch (Throwable $exception) {
			return response()->json([
				'state' => false,
				'message' => $exception->getMessage(),
			]);
		}
	}

	public function statusChange($id, Request $request)
	{
		try {
			$cms = Cms::findByHashId($id);
			if ($request->status == 'active') {
				$status = 'inactive';
			} else {
				$status = 'active';
			}
			$cms->status = $status;
			$cms->save();
			return response()->json([
				'state' => true,
				'message' => __('messages.admin.status_change_succ'),
			]);
		} catch (Throwable $exception) {
			return response()->json([
				'state' => false,
				'message' => $exception->getMessage(),
			]);
		}
	}
}
