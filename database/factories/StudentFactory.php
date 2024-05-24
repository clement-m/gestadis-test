<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory {
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Student::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [
			'lastname' => $this->faker->lastName,
			'firstname' => $this->faker->firstName,
			'phone' => $this->faker->phoneNumber,
			'email' => $this->faker->unique()->safeEmail,
			'address' => $this->faker->address,
			'postal_code' => $this->faker->postcode,
			'city' => $this->faker->city,
			'date_of_birth' => $this->faker->date(),
		];
	}
}
