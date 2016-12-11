<?php

use Illuminate\Database\Seeder;
use App\Artpiece;
use App\Tag;


class ArtpieceTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artpieces =[
            'Monkey' => ['illustration','print design','sculpture'],
            'Tree' => ['illustration','painting','ceramic'],
            'Bear' => ['textile','ceramic','drawing']
        ];

        foreach($artpieces as $title => $tags) {

            $artpiece = Artpiece::where('title','like',$title)->first();

            foreach($tags as $tagName) {
                $tag = Tag::where('name','LIKE',$tagName)->first();
                $artpiece ->tags()->save($tag);
            }
        }
    }
