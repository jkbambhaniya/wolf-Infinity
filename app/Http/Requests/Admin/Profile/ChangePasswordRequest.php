<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
	 */
	public function rules(): array
	{
		return [
			'current_password' => 'required|min:8|max:15',
			'new_password' => 'required|min:8|max:15|confirmed|regex:/^\S*$/u',
			'new_password_confirmation' => 'required|min:8|max:15'
		];
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function messages()
	{
		return [
			'new_password.min' => 'New password must contain at least 8 characters',
			'new_password.confirmed' => 'New password and confirm password should be the same',
			'new_password.regex' => 'New password can/t start or end with a blank space.',
		];
	}
}
