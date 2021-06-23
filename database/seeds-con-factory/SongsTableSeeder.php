<?php

use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = factory(App\Song::class, 10)->make();

        foreach($songs as $song) {

            $song->album()->associate(App\Album::inRandomOrder()->first());
            
            $song->save();

            $song->tags()->attach(App\Tag::inRandomOrder()->take(3)->get());
        }        
    }
}
