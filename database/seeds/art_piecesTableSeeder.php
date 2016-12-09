<?php

use Illuminate\Database\Seeder;

class art_piecesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('art_pieces')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Monkey',
            'artist' => 'Pauline Shoemaker',
            'date' => '2015-01-10',
            'image' => 'fish.jpg',
            'description' => 'This is a monkey.',
        ]);

        DB::table('art_pieces')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Tree',
            'artist' => 'Pauline Shoemaker',
            'date' => '2014-07-04',
            'image' => 'http://pshoemaker.com/images/tree.jpg',
            'description' => 'This is a tree.',
        ]);

        DB::table('art_pieces')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Bear',
            'artist' => 'Pauline Shoemaker',
            'date' => '2016-05-20',
            'image' => 'http://pshoemaker.com/thumb/bear.jpg',
            'description' => 'This is a bear.',
        ]);
    }
}
