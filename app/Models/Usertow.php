<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Usertow extends Model
{
    use HasFactory;
    public function actor(){
        return $this->morphTo();
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function viewer(){
        return $this->belongsTo(Viewer::class);
    }
}
