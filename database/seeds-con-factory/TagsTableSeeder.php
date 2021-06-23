<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = factory(App\Tag::class, 5)->make();

        foreach($tags as $tag) {

            $tag->save();
        }
    }
}
