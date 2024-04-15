<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Blog::create([
            'title' => 'My first blog post',
            'content' => 'This is my first blog post. I hope you like it.'
        ]);

        Blog::create([
            'title' => 'My second blog post',
            'content' => 'This is my second blog post. I hope you like it.'
        ]);

        Blog::create([
            'title' => 'My third blog post',
            'content' => 'This is my third blog post. I hope you like it.'
        ]);

        Blog::create([
            'title' => 'My fourth blog post',
            'content' => 'This is my fourth blog post. I hope you like it.'
        ]);

        Blog::create([
            'title' => 'My fifth blog post',
            'content' => 'This is my fifth blog post. I hope you like it.'
        ]);

        Blog::create([
            'title' => 'My sixth blog post',
            'content' => 'This is my sixth blog post. I hope you like it.'
        ]);

        Blog::create([
            'title' => 'My seventh blog post',
            'content' => 'This is my seventh blog post. I hope you like it.'
        ]);

        Blog::create([
            'title' => 'My eighth blog post',
            'content' => 'This is my eighth blog post. I hope you like it.'
        ]);

        Blog::create([
            'title' => 'My ninth blog post',
            'content' => 'This is my ninth blog post. I hope you like it.'
        ]);

        Blog::create([
            'title' => 'My tenth blog post',
            'content' => 'This is my tenth blog post. I hope you like it.'
        ]);
    }
}
