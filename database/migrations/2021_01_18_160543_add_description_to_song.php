<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToSong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('songs', function (Blueprint $table) {
            
            // questa (il change) chiede di installare un pacchetto
            // composer require doctrine/dbal
            // che poi va cambiata la versione nel file composer.json passando alla 2.0 e
            // facendo poi 
            // composer update
            
            $table->string('title', 100)->nullable(false)->change();
            $table->text('description')->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('songs', function (Blueprint $table) {
            
            $table->string('title', 255)->nullable(true)->change();
            $table->dropColumn('description');
        });
    }
}
