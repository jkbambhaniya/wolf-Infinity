<?php

namespace App\Http\Requests\User\Profile;

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
			'email' => 'required|min:2|max:70|email|unique:admins,email,' . Auth::user()->id,
			'phone' => 'required|unique:admins,phone,' . Auth::user()->id,
			'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,heic|max:51200',
			'bio' => 'nullable|max:500',
		];
	}
}
