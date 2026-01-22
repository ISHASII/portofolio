<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'image' => null,
            'cover_image' => null,
            'tech_stack' => implode(',', fake()->randomElements(['PHP','Laravel','Vue','Tailwind','JS'], 3)),
            'project_url' => null,
            'github_url' => null,
            'featured' => fake()->boolean(20),
        ];
    }
}
