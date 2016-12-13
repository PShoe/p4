<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{

    public function artpieces() {
        return $this->hasMany('App\Artpiece');
    }

    public static function getForDropdown() {

        $artists = Artist::orderBy('last_name', 'ASC')->get();
        $artists_for_dropdown = [];

        foreach($artists as $artist) {
            $artists_for_dropdown[$artist->id] = $artist->first_name.' '.$artist->last_name;
        }
        return $artists_for_dropdown;
    }
}
