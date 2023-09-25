<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;

class UserController extends Controller
{
	/**
	 * Only for "admin" guard are allowed except
	 * for logout.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('admin.user.index', [
			'title' => 'Users',
			'breadcrumb' => array(
				array('title' => 'Users', 'link' => route('admin.user.index'))
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
			1 => 'first_name',
			2 => 'email',
			3 => 'phone',
			4 => 'status',
			5 => 'created_at'
		);
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		$users = User::orderBy($order, $dir);
		$totalData = $users->count();

		$totalFiltered = $totalData;

		if (!empty($request->input('search.value'))) {
			$search = $request->input('search.value');
			$users = $users->where(function ($query) use ($search) {
				$query->where('first_name', 'LIKE', "%{$search}%")
					->orWhere('last_name', 'LIKE', "%{$search}%")
					->orWhere('phone', 'LIKE', "%{$search}%")
					->orWhere('email', 'LIKE', "%{$search}%");
			});

			$totalFiltered =  $users->count();
		}

		$users =  $users->offset($start)
			->limit($limit)
			->get();
		$data = array();
		if (!empty($users)) {
			$sr_no = '1';
			foreach ($users as $user) {
				$nestedData['id'] = $user->id;
				$nestedData['srno'] = $sr_no;
				$nestedData['profile_url'] = $user->profile_url;
				$nestedData['first_name'] = $user->full_name;
				$nestedData['phone'] = $user->phone;
				$nestedData['email'] = $user->email;
				$nestedData['status'] = $user->status;
				$nestedData['created_at'] = Carbon::parse($user->created_at)->format(config('app.date_format'));
				$nestedData['edit_url'] = route('admin.user.edit', $user->hashId);
				$nestedData['delete_url'] = route('admin.user.destroy', $user->hashId);
				$nestedData['status_url'] = route('admin.user.status.change', $user->hashId);
				$nestedData['show_url'] = route('admin.user.show', $user->hashId);
				$nestedData['actions'] = $user->hashId;
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
		return view('admin.user.create', [
			'title' => 'User Create',
			'breadcrumb' => array(
				array('title' => 'Users', 'link' => route('admin.user.index')),
				array('title' => 'User Create', 'link' => '')
			)
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreUserRequest $request)
	{
		try {
			$requestArray = $request->safe()->all();
			$requestArray['first_name'] = Str::title($requestArray['first_name']);
			$requestArray['last_name'] = Str::title($requestArray['last_name']);
			$requestArray['username'] = Str::before($requestArray['email'], '@');
			$requestArray['phone'] = $requestArray['phone_code'] . ' ' . $requestArray['phone'];
			$requestArray['date_of_birth'] = date('Y-m-d', strtotime($request->date_of_birth));
			$requestArray['password'] = Hash::make($requestArray['password']);
			$file = $request->file('image');
			if ($request->avatar_remove == 1) {
				$requestArray['profile'] = NULL;
			}
			if ($file) {
				$path = ImageUploadTrait::imageUpload($file, 'userProfile');
				$requestArray['profile'] = $path;
			}
			if (User::create($requestArray)) {
				Session::flash('success', __('messages.admin.user_create_succ'));
			} else {
				Session::flash('error', __('messages.admin.errors.something_went_wrong'));
			}
			return redirect(route('admin.user.index'));
		} catch (Throwable $exception) {
			Session::flash('error', $exception->getMessage());
			return redirect(route('admin.user.create'));
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show(User $user)
	{
		return view('admin.user.show', [
			'user' => $user,
			'title' => 'User Details',
			'breadcrumb' => array(
				array('title' => 'Users', 'link' => route('admin.user.index')),
				array('title' => 'User Details', 'link' => "")
			)
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(User $user)
	{
		return view('admin.user.edit', [
			'user' => $user,
			'title' => 'Edit User',
			'breadcrumb' => array(
				array('title' => 'Users', 'link' => route('admin.user.index'))
			)
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateUserRequest $request, User $user)
	{
		try {
			$requestArray = $request->except(['password', 'password_confirmation']);
			$requestArray['first_name'] = Str::title($requestArray['first_name']);
			$requestArray['last_name'] = Str::title($requestArray['last_name']);
			$requestArray['username'] = Str::before($requestArray['email'], '@');
			$requestArray['phone'] = $requestArray['phone_code'] . ' ' . $requestArray['phone'];
			$requestArray['date_of_birth'] = date('Y-m-d', strtotime($request->date_of_birth));
			$requestArray['country_id'] = $requestArray['country'];
			$requestArray['state_id'] = $requestArray['state'];
			$requestArray['city_id'] = $requestArray['city'];
			if ($request->password) {
				$requestArray['password'] = Hash::make($request->password);
			}
			$file = $request->file('image');
			if ($request->avatar_remove == 1) {
				$requestArray['profile'] = NULL;
			}
			if ($file) {
				$path = ImageUploadTrait::imageUpload($file, 'userProfile');
				$requestArray['profile'] = $path;
			}
			if ($user->update($requestArray)) {
				Session::flash('success', __('messages.admin.user_create_succ'));
			} else {
				Session::flash('error', __('messages.admin.errors.something_went_wrong'));
			}
			return redirect(route('admin.user.index'));
		} catch (Throwable $exception) {
			Session::flash('error', json_encode($exception->getMessage()));
			return redirect(route('admin.user.edit', $user->id));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(User $user)
	{
		try {
			if ($user->profile && Storage::exists($user->profile)) {
				ImageUploadTrait::imageDelete($user->profile);
			}
			if ($user->delete()) {
				return response()->json([
					'state' => true,
					'message' => __('messages.admin.user_deleted_succ'),
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
			$users = User::whereIn('id', $request->ids);
			$userGet = $users->get();
			if (!empty($userGet)) {
				foreach ($userGet as $user) {
					if ($user->profile && Storage::exists($user->profile)) {
						ImageUploadTrait::imageDelete($user->profile);
					}
				}
			}
			$users->delete();
			return response()->json([
				'state' => true,
				'message' => __('messages.admin.user_deleted_succ'),
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
			$user = User::findByHashId($id);
			if ($request->status == '1') {
				$status = '0';
			} else {
				$status = '1';
			}
			$user->status = $status;
			$user->save();
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
