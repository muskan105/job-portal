<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::get()->random();
            },
            'resume' => $this->faker->url,
            'education' => $this->faker->sentence,
            'experience' => $this->faker->sentence,
            'skills' => implode(',', $this->faker->words(5)),
            'certifications' => $this->faker->sentence,
            'information' => $this->faker->paragraph,
            'location' => $this->faker->address,
        ];
    }
}
