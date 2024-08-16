<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'superuser@superuser.com',
                'email_verified_at' => now(),
                'is_admin' => true,
                'is_superuser' => true,
                'password' => bcrypt('superuser'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'is_admin' => true,
                'is_superuser' => false,
                'password' => bcrypt('admin#'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'email_verified_at' => now(),
                'is_admin' => false,
                'is_superuser' => false,
                'password' => bcrypt('user##'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ]

        ]);

        DB::table('artists')->insert([
            [
                'id' => 1,
                'name' => 'Led Zeppelin',
                'image' => 'https://m.media-amazon.com/images/I/712qO50Cf7L._SL1500_.jpg'
            ],
            [
                'id' => 2,
                'name' => 'The Rolling Stones',
                'image' => 'https://m.media-amazon.com/images/I/91sJuHbnW0L._SL1500_.jpg'
            ],
            [
                'id' => 3,
                'name' => 'The Who',
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/C19aHV-E1gS._SL1000_.png'
            ],
            [
                'id' => 4,
                'name' => 'Pink Floyd',
                'image' => 'https://www.portland5.com/sites/default/files/styles/event_square_large/public/events/2023/08/02/2324_SP_240411_PinkFloyd_p_438x400.jpg?itok=7ZKx2aRz'
            ],
            [
                'id' => 5,
                'name' => 'Queen',
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/71ppskeiZgL._AC_SL1414_.jpg'
            ],
            [
                'id' => 6,
                'name' => 'AC/DC',
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/81lacmEVDhL._AC_SL1500_.jpg'
            ],
            [
                'id' => 7,
                'name' => 'Nirvana',
                'image' => 'https://m.media-amazon.com/images/I/81H2c45J+aL._SS500_.jpg'
            ],
            [
                'id' => 8,
                'name' => 'Guns N\' Roses',
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/91ZCpOJQJfL._SL1500_.jpg'
            ],
            [
                'id' => 9,
                'name' => 'Foo Fighters',
                'image' => 'https://m.media-amazon.com/images/I/81ZKKpuRn8L._AC_SL1387_.jpg'
            ],
            [
                'id' => 10,
                'name' => 'Red Hot Chili Peppers',
                'image' => 'https://m.media-amazon.com/images/I/51z08MxpaIL._SL1000_.jpg'
            ]

        ]);

        DB::table('albums')->insert([
            [
                'artist_id' => 1,
                'name' => 'Led Zeppelin IV',
            ],
            [
                'artist_id' => 2,
                'name' => 'Sticky Fingers',
            ],
            [
                'artist_id' => 3,
                'name' => 'Who’s Next',
            ],
            [
                'artist_id' => 4,
                'name' => 'The Dark Side of the Moon',
            ],
            [
                'artist_id' => 5,
                'name' => 'A Night at the Opera',
            ],
            [
                'artist_id' => 6,
                'name' => 'Back in Black',
            ],
            [
                'artist_id' => 7,
                'name' => 'Nevermind',
            ],
            [
                'artist_id' => 8,
                'name' => 'Appetite for Destruction',
            ],
            [
                'artist_id' => 9,
                'name' => 'The Colour and the Shape',
            ],
            [
                'artist_id' => 10,
                'name' => 'Californication',
            ]
        ]);

        DB::table('songs')->insert([
            // Songs for Led Zeppelin
            [
                'artist_id' => 1,
                'album_id' => 1,
                'title' => 'Stairway to Heaven',
                'duration' => 482 // Duration in seconds
            ],
            [
                'artist_id' => 1,
                'album_id' => 1,
                'title' => 'Black Dog',
                'duration' => 296 // Duration in seconds
            ],

            // Songs for The Rolling Stones
            [
                'artist_id' => 2,
                'album_id' => 2,
                'title' => 'Brown Sugar',
                'duration' => 219 // Duration in seconds
            ],
            [
                'artist_id' => 2,
                'album_id' => 2,
                'title' => 'Wild Horses',
                'duration' => 359 // Duration in seconds
            ],

            // Songs for The Who
            [
                'artist_id' => 3,
                'album_id' => 3,
                'title' => 'Baba O’Riley',
                'duration' => 327 // Duration in seconds
            ],
            [
                'artist_id' => 3,
                'album_id' => 3,
                'title' => 'Behind Blue Eyes',
                'duration' => 258 // Duration in seconds
            ],

            // Songs for Pink Floyd
            [
                'artist_id' => 4,
                'album_id' => 4,
                'title' => 'Comfortably Numb',
                'duration' => 384 // Duration in seconds
            ],
            [
                'artist_id' => 4,
                'album_id' => 4,
                'title' => 'Money',
                'duration' => 382 // Duration in seconds
            ],

            // Songs for Queen
            [
                'artist_id' => 5,
                'album_id' => 5,
                'title' => 'Bohemian Rhapsody',
                'duration' => 354 // Duration in seconds
            ],
            [
                'artist_id' => 5,
                'album_id' => 5,
                'title' => 'You’re My Best Friend',
                'duration' => 197 // Duration in seconds
            ],

            // Songs for AC/DC
            [
                'artist_id' => 6,
                'album_id' => 6,
                'title' => 'Back in Black',
                'duration' => 255 // Duration in seconds
            ],
            [
                'artist_id' => 6,
                'album_id' => 6,
                'title' => 'Hells Bells',
                'duration' => 312 // Duration in seconds
            ],

            // Songs for Nirvana
            [
                'artist_id' => 7,
                'album_id' => 7,
                'title' => 'Smells Like Teen Spirit',
                'duration' => 301 // Duration in seconds
            ],
            [
                'artist_id' => 7,
                'album_id' => 7,
                'title' => 'Come As You Are',
                'duration' => 217 // Duration in seconds
            ],

            // Songs for Guns N' Roses
            [
                'artist_id' => 8,
                'album_id' => 8,
                'title' => 'Sweet Child O’ Mine',
                'duration' => 356 // Duration in seconds
            ],
            [
                'artist_id' => 8,
                'album_id' => 8,
                'title' => 'Welcome to the Jungle',
                'duration' => 259 // Duration in seconds
            ],

            // Songs for Foo Fighters
            [
                'artist_id' => 9,
                'album_id' => 9,
                'title' => 'Everlong',
                'duration' => 251 // Duration in seconds
            ],
            [
                'artist_id' => 9,
                'album_id' => 9,
                'title' => 'My Hero',
                'duration' => 232 // Duration in seconds
            ],

            // Songs for Red Hot Chili Peppers
            [
                'artist_id' => 10,
                'album_id' => 10,
                'title' => 'Californication',
                'duration' => 211 // Duration in seconds
            ],
            [
                'artist_id' => 10,
                'album_id' => 10,
                'title' => 'Scar Tissue',
                'duration' => 330 // Duration in seconds
            ]
        ]);
    }
}
