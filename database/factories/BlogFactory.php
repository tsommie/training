<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'             => $this->faker->text(100),
            'content'           => $this->faker->paragraph(5),
            'meta_description'  => $this->faker->text(180),
            'meta_keywords'     => $this->faker->text(180),
            'published_at'      => $this->faker->dateTime,
        ];
    }
}
