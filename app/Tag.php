<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function artpieces()
    {
        return $this->belongsToMany('App\Artpiece')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $tags = Tag::orderBy('name','ASC')->get();
        $tags_for_checkboxes = [];
        foreach($tags as $tag) {
            $tags_for_checkboxes[$tag->id] = $tag->name;
        }
        return $tags_for_checkboxes;
    }
}
