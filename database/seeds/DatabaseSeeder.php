<?php

use App\Category;
use App\Thread;
use App\Post;
use App\User;
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
        factory(User::class, 5)->create();

        factory(Category::class, 3)->create()->each(function ($thread) {

            $thread->threads()->saveMany(factory(Thread::class, 5)->make([
                'user_id' => User::all()->random()->id
            ]))
            ->each(function ($post) {
                $post->posts()->saveMany(factory(Post::class, 5)->make([
                    'user_id' => User::all()->random()->id
                ]));
            });
        });
    }
}
