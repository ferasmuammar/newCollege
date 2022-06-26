<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public function usertow(){
        return $this->morphOne(Usertow::class,'actor','actor_type','actor_id','id');
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
