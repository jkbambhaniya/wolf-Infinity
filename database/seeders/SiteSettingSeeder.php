<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteSettingSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$siteSetting = array(
			[
				'key' => 'site_address',
				'value' => '525 N Tryon Street Suite 1600
                Charlotte, NC 28202, USA',
				'field_group_name' => 'site_setting',
			],
			[
				'key' => 'site_email',
				'value' => 'corrina@fixrupperhacks.com',
				'field_group_name' => 'site_setting',
			],
			[
				'key' => 'site_phone',
				'value' => '+1704-406-7769',
				'field_group_name' => 'site_setting',
			],
			[
				'key' => 'twitter_url',
				'value' => 'https://www.twitter.com',
				'field_group_name' => 'site_setting',
			],
			[
				'key' => 'facebook_url',
				'value' => 'https://www.facebook.com',
				'field_group_name' => 'site_setting',
			],
			[
				'key' => 'instagram_url',
				'value' => 'https://www.instagram.com',
				'field_group_name' => 'site_setting',
			],
			[
				'key' => 'linkdin_url',
				'value' => 'https://www.linkdin.com',
				'field_group_name' => 'site_setting',
			],
			[
				'key' => 'site_logo',
				'value' => NULL,
				'field_group_name' => 'site_setting',
			],
			[
				'key' => 'favicon',
				'value' => NULL,
				'field_group_name' => 'site_setting',
			],
			[
				'key' => 'header_color',
				'value' => '#ffffff',
				'field_group_name' => 'theme_setting',
			],
			[
				'key' => 'primary_color',
				'value' => '#150946',
				'field_group_name' => 'theme_setting',
			],
			[
				'key' => 'primary_text_color',
				'value' => '#ffffff',
				'field_group_name' => 'theme_setting',
			]
		);
		foreach ($siteSetting as $settings) {
			$exists = SiteSetting::where('key', $settings['key'])->first();
			if (!$exists) {
				SiteSetting::create($settings);
			}
		}
	}
}
