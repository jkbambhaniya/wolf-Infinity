<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class AppSettingUpdateRequest extends FormRequest
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
			'setting.*' => 'required|max:7|regex:/^([0-9.]{1})+$/',
			'setting_password' => 'required',
		];
	}

	/**
	 * @return array|string[]
	 */
	public function messages(): array
	{
		return [
			'setting.*.required' => 'This field is required.',
			'setting.*.max' => 'This field must not be greater than 7 characters.',
			'setting.*.regex' => 'This field format is invalid.',
		];
	}
}
