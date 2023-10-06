<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageUploadRequest extends FormRequest
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
		if ($this->type == 'attaches') {
			return [
				'file' => 'nullable|mimes:doc,docx,csv,txt,pdf|max:51200',
			];
		} else {
			return [
				'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,heic|max:51200',
			];
		}
	}
}
