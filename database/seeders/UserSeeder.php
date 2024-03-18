<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
        ->count(2)
        ->hasAlbums(3)
        ->hasPosts(5)
        ->create();

        User::factory()
        ->count(3)
        ->hasAlbums(1)
        ->hasPosts(4)
        ->create();

        User::factory()
        ->count(5)
        ->hasAlbums(1)
        ->hasPosts(10)
        ->create();
    }
}
