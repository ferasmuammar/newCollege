<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public function cities(){
        return $this->hasMany(City::class);
    }
    public function usertows(){
        return $this->hasMany(Usertow::class);
    }
    public function admins(){
        return $this->hasMany(Admin::class);
    }
    public function authors(){
        return $this->hasMany(Author::class);
    }
    
}
