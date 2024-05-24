<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Training;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training>
 */
class TrainingFactory extends Factory {
	protected $model = Training::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array {
		return [
			'label' => $this->faker->sentence(3),
			'duration' => $this->faker->randomElement(['1 month', '3 months', '6 months', '1 year']),
			'level' => $this->faker->randomElement(['brevet', 'bac', 'bac+2', 'bac+3', 'bac+5']),
		];
	}
}
