<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        $sentence= $this->faker->sentence;
        $slug=Str::slug($sentence);
        return [
            //
            'title' => $sentence,
            'slug' => $slug,
            'body' => $this->faker->paragraph,
            'user_id'=>User::factory()
        ];
    }
}
