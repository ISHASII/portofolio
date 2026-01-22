<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'role' => fake()->jobTitle(),
            'bio' => fake()->paragraph(),
            'avatar' => null,
            'resume_link' => null,
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'github' => 'https://github.com/' . fake()->userName(),
            'linkedin' => 'https://linkedin.com/in/' . fake()->userName(),
            'instagram' => 'https://instagram.com/' . fake()->userName(),
        ];
    }
}
