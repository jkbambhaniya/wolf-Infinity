<?php
// New ResetPasswordController for 'Admin' section

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

	//use ResetsPasswords;

	/**
	 * Where to redirect users after resetting their password.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';
	protected $guard = 'admin';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	// public function __construct() {
	//     $this->middleware('guest');
	// }

	public function showResetPasswordForm(Request $request, $token = null)
	{
		//dd($request->all());
		return view('admin.auth.passwords.reset')->with(
			['title' => 'Admin Reset Password', 'token' => $token, 'email' => $request->email]
		);
	}

	public function reset(Request $request)
	{
		$this->validate($request, $this->rules(), $this->validationErrorMessages());
		// Here we will attempt to reset the user's password. If it is successful we
		// will update the password on an actual user model and persist it to the
		// database. Otherwise we will parse the error and return the response.
		//dd($this->broker());
		$response = $this->broker()->reset(
			$this->credentials($request),
			function ($user, $password) {
				$this->resetPassword($user, $password);
			}
		);
		// If the password was successfully reset, we will redirect the user back to
		// the application's home authenticated view. If there is an error we can
		// redirect them back to where they came from with their error message.
		return $response == Password::PASSWORD_RESET
			? $this->sendResetResponse($response)
			: $this->sendResetFailedResponse($request, $response);
	}

	protected function rules()
	{
		return [
			'token' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed|min:8|regex:/^\S*$/u',
			'password_confirmation' => 'required|min:8',
		];
	}

	protected function validationErrorMessages()
	{
		return [
			'email' => 'Please enter valid email',
			'password.min' => 'New password must contain at least 8 characters',
			'password.confirmed' => 'New password and confirm password should be the same',
			'password.regex' => 'New password can’t start or end with a blank space.',
		];
	}

	public function broker()
	{
		return Password::broker('admin');
	}

	protected function credentials(Request $request)
	{
		return $request->only(
			'email',
			'password',
			'password_confirmation',
			'token'
		);
	}

	protected function resetPassword($user, $password)
	{
		$user->forceFill([
			'password' => bcrypt($password),
			'remember_token' => Str::random(60),
		])->save();
		// $this->guard()->login($user);
	}

	protected function sendResetResponse($response)
	{
		//dd('in sucess');
		return redirect(route('admin.login'))
			->with('status', trans($response));
	}

	protected function sendResetFailedResponse(Request $request, $response)
	{
		//dd('in error');
		return redirect()->back()
			->withInput($request->only('email'))
			->withErrors(['email' => trans($response)]);
	}

	protected function guard()
	{
		return Auth::guard('admin');
	}
}
