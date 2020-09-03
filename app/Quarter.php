<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    public function road(){
        return $this->hasMany("App\Road");
    }
}
