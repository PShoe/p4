<?php

use Illuminate\Database\Seeder;
use p4\Artist;

class ArtpiecesTableSeeder extends Seeder
{

    public function run()
    {

        $artist_id = Artist::where('last_name','=','Shoemaker')->pluck('id')->first();

        DB::table('artpieces')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Fish',
            'artist_id' => $artist_id,
            'date' => '2015-01-10',
            'image' => '1.jpg',
            'description' => 'This is a fish.',
            'user_id' => 1,
        ]);

        $artist_id = Artist::where('last_name','=','Smith')->pluck('id')->first();

        DB::table('artpieces')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Tree',
            'artist_id' => $artist_id,
            'date' => '2014-07-04',
            'image' => '2.jpg',
            'description' => 'This is a tree.',
            'user_id' => 2,
        ]);

        $artist_id = Artist::where('last_name','=','Sherman')->pluck('id')->first();

        DB::table('artpieces')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Bear',
            'artist_id' => $artist_id,
            'date' => '2016-05-20',
            'image' => '3.jpg',
            'description' => 'This is a bear.',
            'user_id' => 1,
        ]);
    }
}
