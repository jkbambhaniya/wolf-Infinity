<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;
use App\Notifications\Admin\ResetPassword as ResetPasswordNotification;

class Admin extends Authenticatable
{
	use HasFactory, Notifiable, HasHashIdRouting, HasHashId;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'password',
		'phone',
		'profile',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function sendPasswordResetNotification($token)
	{
		$this->notify(new ResetPasswordNotification($token));
	}

	public function getProfileUrlAttribute()
	{
		if (!empty($this->profile) && Storage::disk(config('app.filesystem_disk'))->exists($this->profile)) {
			$profile_url = Storage::url($this->profile);
		} else {
			$profile_url = asset('admin-assets/media/svg/avatars/blank.svg');
		}
		return $profile_url;
	}
}
