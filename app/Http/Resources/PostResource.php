<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request)
	{

		return [
			'title' => $this->title,
			'username' => $this->user->name,
			'description' => $this->description,
			'image' => $this->image,
			'user_id' => $this->user_id,
			'created_at' => date('d-m-y', strtotime($this->created_at)),
			'path' => $this->path,
			'slug' => $this->slug,
			'id' => $this->id,
			'reply' => $this->replies
		];
	}
}
