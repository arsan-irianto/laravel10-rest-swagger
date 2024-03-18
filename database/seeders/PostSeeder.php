<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()
        ->count(5)
        ->hasComments(5)
        ->create();

        Post::factory()
        ->count(3)
        ->hasComments(10)
        ->create();

        Post::factory()
        ->count(2)
        ->hasComments(15)
        ->create();
    }
}
