<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\City;
use App\Models\State;
use App\Models\Topic;
use App\Models\Country;
use App\Models\SocialAccount;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable, HasHashIdRouting, HasHashId;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'first_name',
		'last_name',
		'username',
		'email',
		'password',
		'phone',
		'date_of_birth',
		'profile',
		'bio',
		'address',
		'country_id',
		'state_id',
		'city_id',
		'zipcode',
		'latitude',
		'longitude',
		'status',
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
		'password' => 'hashed',
	];

	public function getFullNameAttribute()
	{
		return $this->first_name . " " . $this->last_name;
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

	/**
	 * Get the country associated with the user.
	 */
	public function country()
	{
		return $this->hasOne(Country::class, 'id', 'country_id');
	}

	/**
	 * Get the state associated with the user.
	 */
	public function state()
	{
		return $this->hasOne(State::class, 'id', 'state_id');
	}

	/**
	 * Get the city associated with the user.
	 */
	public function city()
	{
		return $this->hasOne(City::class, 'id', 'city_id');
	}

	public function socialAccounts()
	{
		return $this->hasMany(SocialAccount::class);
	}

	public function topics()
	{
		return $this->belongsToMany(Topic::class);
	}
}
