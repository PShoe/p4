<?php

use Illuminate\Database\Seeder;
use p4\Tag;


class TagsTableSeeder extends Seeder
{
    /**
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
