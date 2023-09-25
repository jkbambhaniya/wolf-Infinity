<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

	protected $redirectTo = '/';
	protected $guard = 'admin';
	protected $username = 'username';

	/**
	 * Show the login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showLoginForm()
	{
		if (Auth::guard($this->guard)->check()) {
			return redirect(route('admin.dashboard'));
		}
		$siteSettingAll = SiteSetting::get();
		$siteSetting = [];
		foreach ($siteSettingAll as $siteSettingVal) {
			$siteSetting[$siteSettingVal->key] = $siteSettingVal->value;
		}
		return view('admin.auth.login', [
			'title' => 'Admin Login',
			'siteSetting' => $siteSetting
		]);
	}

	/**
	 * Login the admin.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function login(Request $request)
	{
		$this->validateLogin($request);
		if (isset($request['username']) && isset($request['password'])) {
			$admin = Admin::where('email', $request['username'])->first();
			if (!$admin) {
				return redirect()
					->route('admin.login')
					->withErrors([
						$this->loginUsername() => 'Please enter valid email',
					]);
			}
			$auth = auth()->guard('admin');
			$validCredentials = Hash::check($request['password'], $admin->password);

			if (!$validCredentials) {
				return redirect()
					->route('admin.login')
					->withErrors([
						'password' => 'Password you\'ve entered is incorrect',
					]);
			}
			$credentials = [
				'email' =>  $request['username'],
				'password' =>  $request['password']
			];
			$remember_me = $request['remember'] ? true : false;
			if ($auth->attempt($credentials, $remember_me)) {
				if (session()->has('locale')) {
					session()->put('locale', session()->get('locale'));
				} else {
					session()->put('locale', 'en');
				}
				Session::flash('alert-success', __('messages.admin.logged_in_succ'));
				return redirect(route('admin.dashboard'));
			} else {
				return $this->sendFailedLoginResponse($request);
			}
		} else {
			return view('admin.auth.login');
		}
	}

	protected function validateLogin(Request $request)
	{
		$this->validate($request, [
			$this->loginUsername() => 'required|email', 'password' => 'required',
		], [
			$this->loginUsername() . '.required' => 'The email field is required.', $this->loginUsername() . '.email' => 'The email must be a valid email address.', 'password.required' => 'The password field is required.',
		]);
	}

	public function loginUsername()
	{
		return property_exists($this, 'username') ? $this->username : 'email';
	}

	protected function sendFailedLoginResponse(Request $request)
	{
		return redirect()->back()
			->withInput($request->only($this->loginUsername(), 'remember'))
			->withErrors([
				$this->loginUsername() => $this->getFailedLoginMessage(),
			]);
	}

	protected function getFailedLoginMessage()
	{
		return Lang::has('auth.failed')
			? Lang::get('auth.failed')
			: 'Please add correct data.';
	}

	public function logout()
	{
		Auth::guard('admin')->logout();
		return redirect()
			->route('admin.login')
			->with('status',  __('auth.logout'));
	}
}
