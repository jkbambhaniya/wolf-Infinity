<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$admin = array(
			'first_name' => 'Admin',
			'Last_name' => 'Demo',
			'email' => 'admin@yopmail.com',
			'password' => Hash::make('Password@123')
		);
		$exists = Admin::where('email', $admin['email'])->first();
		if (!$exists) {
			Admin::create($admin);
		}
	}
}
