<?php

use App\Category;
use App\Comment;
use App\Image;
use App\Post;
use App\Tag;
use App\User;
use App\Video;
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
        // $this->call(UserSeeder::class);
        factory(User::class,100)->create();
        factory(Post::class,1500)->create();
        factory(Category::class,10)->create();
        factory(Tag::class,1500)->create();
        factory(Image::class,2500)->create();
        factory(Video::class,500)->create();
        factory(Comment::class,2500)->create();
    }
}
