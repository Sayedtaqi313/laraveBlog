<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::factory(20)->create();
        \App\Models\Role::factory(3)->create();
         $users = \App\Models\User::factory(10)->create();
         \App\Models\Category::factory(20)->create();
        $posts = \App\Models\Post::factory(100)->create();
         \App\Models\Comment::factory(500)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        foreach($users as $user) {
            $user->image()->save(Image::factory()->make());
        }
        foreach($posts as $post) {
            $tags_id = [];
            $tags_id[] = \App\Models\Tag::all()->random()->id;
            $tags_id[] = \App\Models\Tag::all()->random()->id;
            $tags_id[] = \App\Models\Tag::all()->random()->id;
            $post->tags()->sync($tags_id);
            $post->image()->save(Image::factory()->make());
        }
    }
}
