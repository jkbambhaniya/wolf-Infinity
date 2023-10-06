<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\User\Profile\UpdateProfileRequest;
use App\Http\Requests\Admin\Profile\ChangePasswordRequest;

class UserController extends Controller
{

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Request $request)
	{
		$user = User::with('topics')->find(Auth::user()->id);
		$topics = Topic::where('status', 'active')->get();
		return view('user.profile-edit', [
			'title' => 'Edit Profile',
			'user' => $user,
			'topics' => $topics
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateProfileRequest $request)
	{
		try {
			dd($request);
			$user = User::find(Auth::user()->id);
			$file = $request->file('image');
			if ($request->avatar_remove == 1) {
				if ($user->profile && Storage::exists($user->profile)) {
					ImageUploadTrait::imageDelete($user->profile);
				}
				$requestArray['profile'] = NULL;
			}
			if ($file) {
				if ($user->profile && Storage::exists($user->profile)) {
					ImageUploadTrait::imageDelete($user->profile);
				}
				$path = ImageUploadTrait::imageUpload($file, 'userProfile');
				$requestArray['profile'] = $path;
			}
			if ($user->update($requestArray)) {
				Session::flash('success', __('messages.user.profile_updated'));
			} else {
				Session::flash('error', __('messages.user.errors.something_went_wrong'));
			}
			return redirect(route('user.show.profile'));
		} catch (Throwable $exception) {
			Session::flash('error', $exception->getMessage());
			return redirect(route('user.edit.profile'));
		}
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
			$user = User::find(Auth::user()->id);
			if (!Hash::check($requestArray['current_password'], $user->password)) {
				return redirect(route('user.edit.profile'))->withErrors(['current_password' =>  __('messages.user.errors.valid_current_password')])->withInput();
			}
			if (Hash::check($requestArray['new_password'], $user->password)) {
				return redirect(route('user.edit.profile'))->withErrors(['new_password' =>  __('messages.user.password_not_match')])->withInput();
			}
			$user->password = Hash::make($requestArray['new_password']);
			if ($user->save()) {
				Auth::logout();
				Session::flash('alert-success', __('messages.user.password_updated_success'));
			} else {
				Session::flash('alert-success', __('messages.user.errors.something_went_wrong'));
			}
			return redirect(route('welcome'));
		} catch (Throwable $exception) {
			Session::flash('alert-danger', $exception->getMessage());
			return redirect(route('user.edit.profile'));
		}
	}
}
