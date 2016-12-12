<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectArtpiecesAndUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::table('artpieces', function (Blueprint $table) {

    $table->integer('user_id')->unsigned();

    $table->foreign('user_id')->references('id')->on('users');

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

    $table->dropForeign('artpieces_user_id_foreign');

    $table->dropColumn('user_id');
});
    }
}
