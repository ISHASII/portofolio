<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'path' => null,
            'caption' => fake()->sentence(),
            'position' => 0,
        ];
    }
}
