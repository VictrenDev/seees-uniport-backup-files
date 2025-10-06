<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
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
            'desc' => $this->faker->sentence(),
            'body' => $this->faker->paragraphs(5, true),
            'author' => $this->faker->name(),
            'status' => $this->faker->randomElement(['pendind', 'published']),
            'read_min' => $this->faker->randomElement(['3', '7', '15', '1']),
            'starting_at' => $this->faker->date(),
            'tag' => $this->faker->randomElement(['sport', 'research', 'campaign', 'event', 'resource', 'seminar', 'news', 'project']),
        ];
    }
}
