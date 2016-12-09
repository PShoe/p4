<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Art_Piece extends Model
{

    public function artist() {
        return $this->belongsTo('p4\Artist');
    }

    public function tags(){
        return $this->belongsToMany('p4\Tag')->withTimestamps();
    }

    public function user() {
        return $this->belongsTo('p4\User');
    }


}
