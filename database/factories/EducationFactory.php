<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    public function definition(): array
    {
        $start = fake()->date();
        $end = fake()->boolean(50) ? fake()->date() : null;

        return [
            'institution' => fake()->company() . ' University',
            'degree' => fake()->word(),
            'field' => fake()->word(),
            'start_date' => $start,
            'end_date' => $end,
            'current' => $end ? false : true,
            'description' => fake()->paragraph(),
            'institution_logo' => null,
        ];
    }
}
