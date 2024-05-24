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
			$table->string('phone', 20);
			$table->string('email', 191)->unique();
			$table->string('address', 255);
			$table->string('postal_code', 10);
			$table->string('city', 255);
			$table->date('date_of_birth');
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
