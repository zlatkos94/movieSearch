<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        Movie::create([

            'title' => 'Kad mrtvi zapjevaju',
            'overview' => 'Kad mrtvi zapjevaju, hrvatski je dugometražni film iz 1998. godine, u režiji Krste Papića i produkciji Jadran filma i HRT-a. Radnja se vrti oko dva hrvatska imigranta koji se vraćaju u domovinu početkom 1990-ih i njihovim zgodama na putovanju iz Njemačke.',
            'backdrop_path' => '/',
            'vote_average' => $faker->randomFloat(1, 1, 10),

        ]);
        Movie::create([
            'title' => 'The Lord of the Rings',
            'overview' => 'The Lord of the Rings is a film series of three epic fantasy adventure films directed by Peter Jackson, based on the novel written by J. R. R. Tolkien.',
            'backdrop_path' => '/',
            'vote_average' => $faker->randomFloat(1, 1, 10),
        ]);
    }
}
