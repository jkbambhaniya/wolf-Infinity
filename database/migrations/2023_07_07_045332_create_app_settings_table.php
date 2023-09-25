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
		Schema::create('app_settings', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('setting');
			$table->enum('compulsory', ['0', '1'])->default('0')->comment('0 = Not Compulsory, 1 = Compulsory');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('app_settings');
	}
};
