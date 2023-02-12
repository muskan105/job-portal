<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'company_name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'requirement' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'experience' => $this->faker->sentence,
            'note' => $this->faker->sentence,
            'start_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
