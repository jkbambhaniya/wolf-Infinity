<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountriesResource extends JsonResource
{
	/**
	 * Transform the resource collection into an array.
	 *
	 * @return array<int|string, mixed>
	 */
	public function toArray(Request $request): array
	{
		return [
			'id' => $this->id,
			'name' => $this->name,
			'text' => $this->name,
			'iso2' => $this->iso2,
			'iso2lower' => Str::lower($this->iso2),
			'iso3' => $this->iso3,
			'flagUrl' => asset('country-flags/' . Str::lower($this->iso2) . '.svg'),
		];
	}
}
