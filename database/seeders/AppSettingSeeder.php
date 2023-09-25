<?php

namespace Database\Seeders;

use App\Models\AppSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppSettingSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$appSettings = array(
			[
				'name' => 'maintenance_mode',
				'setting' => '0',
				'compulsory' => '0',
			],
			[
				'name' => 'android_customers',
				'setting' => '1.0.0',
				'compulsory' => '0',
			],
			[
				'name' => 'android_service_providers',
				'setting' => '1.0.0',
				'compulsory' => '0',
			],
			[
				'name' => 'ios_customers',
				'setting' => '1.0.0',
				'compulsory' => '0',
			],
			[
				'name' => 'ios_service_providers',
				'setting' => '1.0.0',
				'compulsory' => '0',
			],
		);
		foreach ($appSettings as $settings) {
			$exists = AppSetting::where('name', $settings['name'])->first();
			if (!$exists) {
				AppSetting::create($settings);
			}
		}
	}
}
