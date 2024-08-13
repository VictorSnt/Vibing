<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueConstraintToTitleAndArtistIdInSongsTable extends Migration
{
    public function up()
    {
        Schema::table('songs', function (Blueprint $table) {

            $table->unique(['title', 'artist_id']);
        });
    }

    public function down()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->dropUnique(['title', 'artist_id']);
        });
    }
}
