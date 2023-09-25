<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('username');
			$table->string('email')->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->string('phone', 20)->nullable();
			$table->date('date_of_birth')->nullable();
			$table->string('profile')->nullable();
			$table->text('bio')->nullable();
			$table->text('address')->nullable();
			$table->unsignedBigInteger('country_id')->nullable();
			$table->unsignedBigInteger('state_id')->nullable();
			$table->unsignedBigInteger('city_id')->nullable();
			$table->string('zipcode')->nullable();
			$table->string('latitude')->nullable();
			$table->string('longitude')->nullable();
			$table->enum('status', ['inactive', 'active'])->default('active');
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
			$table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
			$table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropForeign(['country_id']);
		Schema::dropForeign(['state_id']);
		Schema::dropForeign(['city_id']);
		Schema::dropIfExists('users');
	}
};
