<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Artist;
use App\Models\Album;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence, // Gera um título fictício para a música
            'artist_id' => Artist::factory(), // Cria um novo artista e usa o ID desse artista
            'album_id' => Album::factory(),   // Cria um novo álbum e usa o ID desse álbum
            'duration' => $this->faker->numberBetween(60, 360), // Gera uma duração fictícia em segundos (entre 1 e 6 minutos)
        ];
    }
}
