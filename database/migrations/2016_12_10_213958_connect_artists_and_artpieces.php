<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectArtistsAndArtpieces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::table('artpieces', function (Blueprint $table) {

    $table->integer('artist_id')->unsigned();

    $table->foreign('artist_id')->references('id')->on('artists');

});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::table('artpieces', function (Blueprint $table) {

    $table->dropForeign('artpieces_artist_id_foreign');

    $table->dropColumn('artist_id');
});
    }
}
