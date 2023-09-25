<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingUpdateRequest extends FormRequest
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
			'value.site_logo' => 'nullable|image',
			'value.site_email' => 'required',
			'value.site_address' => 'required',
			'value.site_phone' => 'required',
			'value.twitter_url' => 'required',
			'value.facebook_url' => 'required',
			'value.instagram_url' => 'required',
			'value.linkdin_url' => 'required',
			'value.header_color' => 'required',
			'value.primary_color' => 'required',
			'value.primary_text_color' => 'required',
			'value.favicon' => 'nullable|image',
		];
	}

	/**
	 * @return array|string[]
	 */
	public function messages(): array
	{
		return [
			'value.site_logo.required' => 'The site logo is required.',
			'value.site_email.required' => 'The site email field is required.',
			'value.site_address.required' => 'The site address field is required.',
			'value.site_phone.required' => 'The site phone field is required.',
			'value.twitter_url.required' => 'The twitter url field is required.',
			'value.facebook_url.required' => 'The facebook url field is required.',
			'value.instagram_url.required' => 'The instagram url field is required.',
			'value.linkdin_url.required' => 'The linkdin url field is required.',
			'value.header_color.required' => 'The header color field is required.',
			'value.primary_color.required' => 'The primary color field is required.',
			'value.primary_text_color.required' => 'The primary text color field is required.',
			'value.favicon.required' => 'The favicon is required.',
		];
	}
}
