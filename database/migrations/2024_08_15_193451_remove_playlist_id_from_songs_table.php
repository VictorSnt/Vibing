<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemovePlaylistIdFromSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('songs', function (Blueprint $table) {
            // Remove the foreign key constraint
            $table->dropForeign(['playlist_id']);
            
            // Remove the column itself
            $table->dropColumn('playlist_id');
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
            // Re-add the column
            $table->foreignId('playlist_id')->nullable()->constrained()->onDelete('cascade');
        });
    }
}
