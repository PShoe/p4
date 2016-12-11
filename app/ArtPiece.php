<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Artpiece extends Model

{
    protected $table = 'artpieces';

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
