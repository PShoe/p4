<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtpieceTagTable extends Migration
{
    
    public function up()
    {
        Schema::create('artpiece_tag', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->integer('artpiece_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('artpiece_id')->references('id')->on('artpieces');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    public function down()
    {
        Schema::drop('artpiece_tag');
    }
}
