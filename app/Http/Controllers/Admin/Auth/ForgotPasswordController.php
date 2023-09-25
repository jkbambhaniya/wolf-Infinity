<?php
// New ForgotPasswordController for 'Admin' section

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

	//use SendsPasswordResetEmails;
	protected $guard = 'admin';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	// public function __construct() {
	//     $this->middleware('guest');
	// }

	public function showForgotPasswordForm()
	{
		if (Auth::guard('admin')->check()) {
			return redirect('/');
		}
		return view('admin.auth.passwords.email', [
			'title' => 'Admin Forgot Password'
		]);
	}

	public function sendResetLinkEmail(Request $request)
	{
		$this->validate($request, ['email' => 'required|email']);
		// We will send the password reset link to this user. Once we have attempted
		// to send the link, we will examine the response then see the message we
		// need to show to the user. Finally, we'll send out a proper response.
		$response = $this->broker()->sendResetLink(
			$request->only('email')
		);

		return $response == Password::RESET_LINK_SENT
			? $this->sendResetLinkResponse($response)
			: $this->sendResetLinkFailedResponse($request, $response);
	}

	public function broker()
	{
		return Password::broker('admin');
	}

	protected function sendResetLinkResponse($response)
	{
		//, trans($response)
		return redirect('admin/login')->with('status', __('messages.admin.admin_password_reset_link'));
	}

	protected function sendResetLinkFailedResponse(Request $request, $response)
	{
		return back()->withErrors(
			['email' => __('messages.admin.errors.valid_email_check')]
		);
	}
}
