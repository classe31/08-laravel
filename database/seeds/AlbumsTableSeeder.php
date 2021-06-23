<?php

use Illuminate\Database\Seeder;
use App\Album;
use Faker\Generator as Faker;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 5; $i++) {

            $album = new Album();
            $album->title = $faker->word();

            $album->save();
        }
    }
}
