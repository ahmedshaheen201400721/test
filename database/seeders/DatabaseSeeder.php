<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->hasPosts(6)->create();
        Tag::factory(10)->create();
        Post::all()->each(function ($post) {
            $post->tags()->attach(Tag::inRandomOrder()->take(rand(2,5))->pluck('id'));
        });
        // Post::factory(10)->create();
    }
}
