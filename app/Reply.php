<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
	protected $table = "comments";
	protected $fillable = ['post_id', 'user_id', 'comment'];
	protected static function boot()
	{
		parent::boot();
		static::creating(function ($reply) {
			$reply->user_id = auth()->id();
		});
	}
	public function posts()
	{
		return $this->belongsTo(post::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
