<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artist::factory()->count(10)->create();

        // Gera 20 álbuns associados aos artistas
        Album::factory()->count(20)->create();

        // Gera 50 músicas associadas aos álbuns e artistas
        Song::factory()->count(50)->create();
    }
}
