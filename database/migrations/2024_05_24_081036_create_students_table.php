<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create('students', function (Blueprint $table) {
			$table->id();
			$table->string('lastname', 255);
			$table->string('firstname', 255);
			$table->string('phone', 20)->nullable();
			$table->string('email')->unique();
			$table->string('address', 255)->nullable();
			$table->string('postal_code', 10)->nullable();
			$table->string('city', 255)->nullable();
			$table->date('date_of_birth');
			$table->float('latitude', 10, 7)->nullable();
			$table->float('longitude', 10, 7)->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists('students');
	}
};
