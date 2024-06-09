<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        // Fetch random article ID from existing articles
        $articleId = Article::inRandomOrder()->first()->id;

        // Fetch random user ID from existing users
        $userId = User::inRandomOrder()->first()->id;

        return [
            'article_id' => $articleId,
            'user_id' => $userId,
            'content' => $this->faker->paragraph,
        ];
    }
}
