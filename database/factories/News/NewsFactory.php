<?php

namespace Database\Factories\News;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'title' => $this->faker->sentence(3),
            'slug' => $this->faker->unique()->slug,
            'intro_text' => $this->faker->paragraph(3),
            'description' => $this->faker->paragraph(10),
            'image' => $this->faker->imageUrl(640, 480)
        ];
    }
}
