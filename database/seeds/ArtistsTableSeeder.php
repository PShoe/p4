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
            'first_name' => 'Jill',
            'last_name' => 'Smith',
            'location' => 'Los Angeles',

        ]);

        DB::table('artists')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'first_name' => 'Jamal',
            'last_name' => 'Jones',
            'location' => 'Houston',

        ]);
    }
}
