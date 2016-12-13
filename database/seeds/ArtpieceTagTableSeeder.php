<?php

use Illuminate\Database\Seeder;
use p4\Artpiece;
use p4\Tag;


class ArtpieceTagTableSeeder extends Seeder
{

    public function run()
    {
        $artpieces =[
            'Fish' => ['illustration','print design','sculpture'],
            'Tree' => ['illustration','painting','ceramic'],
            'Bear' => ['textile','ceramic','drawing']
        ];

        foreach($artpieces as $title => $tags) {

            $artpiece = Artpiece::where('title','like',$title)->first();

            foreach($tags as $tagName) {
                $tag = Tag::where('name','LIKE',$tagName)->first();
                $artpiece->tags()->save($tag);
            }
        }
    }

}
