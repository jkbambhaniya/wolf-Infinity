<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
			'first_name' => 'required|min:2|max:35',
			'last_name' => 'required|min:2|max:35',
			'email' => 'required|min:2|max:70|email|unique:admins,email,' . Auth::guard('admin')->user()->id,
			'phone' => 'required|unique:admins,phone,' . Auth::guard('admin')->user()->id,
			'phone_code' => 'required',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,heic|max:51200'
		];
	}

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'phone.required' => 'The mobile number field is required',
			'phone.regex' => 'The mobile number format is invalid.',
			'phone.numeric' => 'The mobile number must be a number.',
			'phone.digits' => 'Please enter 10 digit valid mobile number',
			'phone.unique' => 'The mobile number has already been taken.',
			'image.max' => 'The profile image must not be greater than 50 MB.',
		];
	}
}
