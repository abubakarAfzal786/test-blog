<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;
use App\Reply;

class User extends Authenticatable implements JWTSubject
{
	use Notifiable;
	const REGULAR_USER = "user";
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = bcrypt($value);
	}
	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];
	// Rest omitted for brevity

	/**
	 * Get the identifier that will be stored in the subject claim of the JWT.
	 *
	 * @return mixed
	 */
	public function getJWTIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Return a key value array, containing any custom claims to be added to the JWT.
	 *
	 * @return array
	 */
	public function getJWTCustomClaims()
	{
		return [];
	}
	// public function question()
	// {
	//     return $this->hasMany('App\Question');
	// }
	public function post()
	{
		return $this->hasMany(post::class);
	}
	// public function reply()
	// {
	//     return $this->hasMany(Reply::class);
	// }
	public function chat()
	{
	}
}
