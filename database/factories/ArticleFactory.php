<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'image' => 'images/' . $this->faker->image('public/storage/images', 640, 480, null, false),
            'author' => $this->faker->name,
            'category' => $this->faker->randomElement(['Technology', 'Science', 'Business', 'Health']), // Adjust categories as needed
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

}
