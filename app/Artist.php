<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public function artPieces() {
    return $this->hasMany('p4\Art_Piece');
    }

}
