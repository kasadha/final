<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agric extends Model
{
   public function latest(){
     return $this->hasMany(Latest::class);
  }
}
