<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{

    public $rockBandNames = [
        'The Rolling Stones', 'Led Zeppelin', 'Pink Floyd', 
        'AC/DC', 'Nirvana', 'Guns N\' Roses', 'The Who',
        'Black Sabbath', 'Metallica', 'Queen', 'The Doors',
        'Deep Purple', 'U2', 'The Clash', 'Aerosmith',
        'Foo Fighters', 'Red Hot Chili Peppers', 'Radiohead',
        'Pearl Jam', 'Soundgarden', 'The White Stripes',
        'Lynyrd Skynyrd', 'Rush', 'Def Leppard', 'Heart',
        'The Kinks', 'Creedence Clearwater Revival', 'The Smashing Pumpkins',
        'Green Day', 'Oasis', 'The Pixies', 'Blur',
        'Alice In Chains', 'Jane\'s Addiction', 'Stone Temple Pilots',
        'Iggy Pop', 'The Black Keys', 'Nine Inch Nails', 'Tool',
        'Rage Against The Machine', 'Weezer', 'Wolfmother',
        'The Raconteurs', 'Wolf Alice', 'Kings of Leon', 'Arctic Monkeys',
        'Yes', 'Genesis', 'Emerson, Lake & Palmer', 'Ramones',
        'Sex Pistols', 'Dead Kennedys', 'Beck', 'Modest Mouse',
        'Arcade Fire', 'Tame Impala', 'The National'
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->randomElement($this->rockBandNames);
        return [
            'name' => $name, 
        ];
    }
}
