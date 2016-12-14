<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('artists')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'first_name' => 'Pauline',
            'last_name' => 'Shoemaker',
            'location' => 'Boston',

        ]);

        DB::table('artists')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'first_name' => 'Jennie',
            'last_name' => 'Smith',
            'location' => 'Pittsburgh',

        ]);

        DB::table('artists')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'first_name' => 'Mary',
            'last_name' => 'Sherman',
            'location' => 'Philadelphia',

        ]);
        DB::table('artists')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'first_name' => 'Liam',
            'last_name' => 'Costello',
            'location' => 'Melbourne',

        ]);
    }
}
