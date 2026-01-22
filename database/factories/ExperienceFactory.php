<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    public function definition(): array
    {
        $start = fake()->date();
        $end = fake()->boolean(50) ? fake()->date() : null;

        return [
            'company' => fake()->company(),
            'position' => fake()->jobTitle(),
            'start_date' => $start,
            'end_date' => $end,
            'current' => $end ? false : true,
            'description' => fake()->paragraph(),
            'company_logo' => null,
        ];
    }
}
