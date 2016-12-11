<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
public function artpieces()
 {
     return $this->belongsToMany('p4\Artpiece')->withTimestamps();
 }
 }
