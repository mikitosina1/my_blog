<?php

namespace Database\Factories;

use App\Models\FeedbackMail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackMailFactory extends Factory
{
    protected $model = FeedbackMail::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'subject' => fake()->sentence(5),
            'message' => fake()->paragraph(),
            'by_user' => User::factory(),
        ];
    }

    public function guest(): static
    {
        return $this->state(fn () => [
            'by_user' => 0,
        ]);
    }
}
