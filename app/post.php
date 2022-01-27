<?php

namespace App;

use App\Reply;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Sluggable;

class post extends Model
{
	use Sluggable;
	protected $with = ['replies'];
	protected $table = 'post';
	protected $fillable = ['title', 'description', 'image', 'user_id'];

	/**
	 * Return the sluggable configuration array for this model.
	 *
	 * @return array
	 */
	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => 'title'
			]
		];
	}
	public function getRouteKeyName()
	{
		return 'slug';
	}
	public function replies()
	{
		return $this->hasMany(Reply::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function getPathAttribute()
	{
		return "/post/$this->slug";
	}
}
