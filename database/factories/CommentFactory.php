<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Model>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {

        $faker = \Faker\Factory::create('es_ES'); // Change to desired language
        return [
            'user_id' => User::factory(),
            'site_id' => Site::factory(),
            'parent_id' => null, // Default to top-level comment
            'content' => $this->faker->realText(rand(20, 60)),
            'upvotes' => 0,
        ];
    }

    public function withParent(Comment $parent): CommentFactory
    {
        return $this->state([
            'parent_id' => $parent->id,
        ]);
    }
}
