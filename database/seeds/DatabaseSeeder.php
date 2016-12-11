<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TagsTableSeeder::class);
        $this->call(ArtistsTableSeeder::class);
        $this->call(ArtpiecesTableSeeder::class);
        $this->call(ArtpieceTagTableSeeder::class);
        $this->call(UsersTableSeeder::class);


    }
}
