<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::factory()
        ->count(5)
        ->hasUser(5)
        ->hasPhotos(5)
        ->create();

        Album::factory()
        ->count(3)
        ->hasUser(5)
        ->hasPhotos(10)
        ->create();

        Album::factory()
        ->count(2)
        ->hasUser(5)
        ->hasPhotos(15)
        ->create();
    }
}
