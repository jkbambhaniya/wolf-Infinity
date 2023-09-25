<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteSetting extends Model
{
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'site_address',
		'site_email',
		'site_phone',
		'twitter_url',
		'facebook_url',
		'instagram_url',
		'linkdin_url',
		'site_logo',
		'favicon',
		'header_color',
		'primary_color',
		'primary_text_color'
	];
}
