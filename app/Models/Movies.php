<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    public function users(){
        return $this->belongsToMany(User::class,'user_movie','movie_id','user_id');
    }
}
