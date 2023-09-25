<?php

namespace App\Http\Resources\topic;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopicRootResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(Request $request): array
	{
		// dd($this);
		$parent = '#';
		$type = 'folder';
		if ($this->parent_id != 0) {
			$parent = $this->parent_id;
		}
		if ($this->type != 'ki-solid ki-folder') {
			$type = 'file';
		}
		return [
			'id' => $this->id,
			'text' => $this->name,
			"type" => $type,
			'parent' => $parent,
		];
	}
}
