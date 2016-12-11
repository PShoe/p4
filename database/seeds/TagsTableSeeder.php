<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $data = ['illustration','print design','sculpture','painting','textile','ceramic','drawing'];

         foreach($data as $tagName) {
             $tag = new Tag();
             $tag->name = $tagName;
             $tag->save();
         }
     }
 }
