<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'title' => $this->faker->sentence(),
        'body' => $this->faker->text(3000),
        'created_at' =>  $this->faker->dateTimeBetween('-1 year', 'now'),
        'updated_at' =>  $this->faker->dateTimeBetween('-1 year', 'now'),
        'image' => $this->faker ->imageUrl(640, 480),
        'author' => $this->faker->name(),
        ];
    }
}
