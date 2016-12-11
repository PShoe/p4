<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{

    public function artpieces() {
    return $this->hasMany('p4\Artpiece');
    }
}
