<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albums = factory(App\Album::class, 5)->make();

        foreach($albums as $album) {

            $album->save();
        }
    }
}
