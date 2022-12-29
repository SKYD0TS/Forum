<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(3, 5)),
            'slug' => $this->faker->slug(),
            'content' => $this->faker->paragraph(mt_rand(4, 8)),
            'excerpt' => $this->faker->paragraph(1),
            'user_id' => mt_rand(1, 4),
            'category_id' =>  mt_rand(1, 4)
        ];
    }
}