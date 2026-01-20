<?php

namespace Database\Factories;

use App\Models\PostCDAG;
use App\Models\UserCDAG;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostCDAG>
 */
class PostCDAGFactory extends Factory
{
    protected $model = PostCDAG::class;
    public function definition(): array
    {
        $isPublished = fake()->boolean(70); // 70% publicadas
        $categories = ['Technology', 'Health', 'Business', 'Entertainment', 'Sports', 'Science', 'Education'];
        
        return [
            'user_id' => UserCDAG::factory(),
            'title' => fake()->sentence(),
            'content' => fake()->paragraphs(5, true),
            'excerpt' => fake()->text(200),
            'views' => fake()->numberBetween(0, 10000),
            'category' => fake()->randomElement($categories),
            'published_at' => $isPublished ? fake()->dateTimeBetween('-1 year', 'now') : null,
            'is_published' => $isPublished,
        ];
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => true,
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ]);
    }

    public function unpublished(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => false,
            'published_at' => null,
        ]);
    }
}