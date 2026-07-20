<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'tags' => implode(',', fake()->words(3)),
            'text' => fake()->paragraphs(3, true),
            'user_id' => User::factory(),
        ];
    }
}
