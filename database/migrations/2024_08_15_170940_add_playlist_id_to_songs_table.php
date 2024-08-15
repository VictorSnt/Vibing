<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlaylistIdToSongsTable extends Migration
{
    public function up()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->foreignId('playlist_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->dropForeign(['playlist_id']);
            $table->dropColumn('playlist_id');
        });
    }
}
