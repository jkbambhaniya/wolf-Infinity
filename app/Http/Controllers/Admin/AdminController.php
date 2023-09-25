<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Profile\UpdateProfileRequest;
use App\Http\Requests\Admin\Profile\ChangePasswordRequest;

class AdminController extends Controller
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
		$admin = Admin::find(Auth::guard('admin')->user()->id);
		return view('admin.profile.show', [
			'title' => 'Profile Details',
			'admin' => $admin,
			'breadcrumb' => array()
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Admin $admin)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Admin $admin)
	{
		$admin = Admin::find(Auth::guard('admin')->user()->id);
		return view('admin.profile.edit', [
			'title' => 'Edit Profile',
			'admin' => $admin
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateProfileRequest $request)
	{
		try {
			$admin = Admin::find(Auth::guard('admin')->user()->id);
			$requestArray = $request->safe()->all();
			$requestArray['first_name'] = Str::title($requestArray['first_name']);
			$requestArray['last_name'] = Str::title($requestArray['last_name']);
			$requestArray['phone'] = $requestArray['phone_code'] . ' ' . $requestArray['phone'];
			$file = $request->file('image');
			if ($request->avatar_remove == 1) {
				if ($admin->profile && Storage::exists($admin->profile)) {
					ImageUploadTrait::imageDelete($admin->profile);
				}
				$requestArray['profile'] = NULL;
			}
			if ($file) {
				if ($admin->profile && Storage::exists($admin->profile)) {
					ImageUploadTrait::imageDelete($admin->profile);
				}
				$path = ImageUploadTrait::imageUpload($file, 'adminProfile');
				$requestArray['profile'] = $path;
			}
			if ($admin->update($requestArray)) {
				Session::flash('success', __('messages.admin.profile_updated'));
			} else {
				Session::flash('error', __('messages.admin.errors.something_went_wrong'));
			}
			return redirect(route('admin.show.profile'));
		} catch (Throwable $exception) {
			Session::flash('error', $exception->getMessage());
			return redirect(route('admin.edit.profile'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Admin $admin)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Admin  $admin
	 * @return \Illuminate\Http\Response
	 */
	public function changePasswordView()
	{
		$admin = Admin::find(Auth::guard('admin')->user()->id);
		if (!$admin) {
			abort(404);
		}
		return view('admin.profile.change-password', [
			'title' => 'Admin Change Password',
			'admin' => $admin
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Admin  $admin
	 * @return \Illuminate\Http\Response
	 */
	public function changePassword(ChangePasswordRequest $request)
	{
		try {
			$requestArray = $request->safe()->all();
			$admin = Admin::find(Auth::guard('admin')->user()->id);
			if (!Hash::check($requestArray['current_password'], $admin->password)) {
				return redirect(route('admin.change.password.view'))->withErrors(['current_password' =>  __('messages.admin.errors.valid_current_password')])->withInput();
			}
			if (Hash::check($requestArray['new_password'], $admin->password)) {
				return redirect(route('admin.change.password.view'))->withErrors(['new_password' =>  __('messages.admin.password_not_match')])->withInput();
			}
			$admin->password = Hash::make($requestArray['new_password']);
			if ($admin->save()) {
				Auth::guard('admin')->logout();
				Session::flash('alert-success', __('messages.admin.password_updated_success'));
			} else {
				Session::flash('alert-success', __('messages.admin.errors.something_went_wrong'));
			}
			return redirect(route('admin.login'));
		} catch (Throwable $exception) {
			Session::flash('alert-danger', $exception->getMessage());
			return redirect(route('admin.change.password.view'));
		}
	}
}
