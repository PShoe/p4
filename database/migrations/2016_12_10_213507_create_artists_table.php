<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    Schema::create('artists', function (Blueprint $table) {

    $table->increments('id');
    $table->timestamps();

    $table->string('first_name');
    $table->string('last_name');
    $table->string('location');

});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::drop('artists');

    }
}
