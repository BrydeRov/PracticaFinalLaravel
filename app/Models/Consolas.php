<?php

namespace App\Models;

use App\Models\Juegos ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consolas extends Model
{
    use HasFactory;

    public function Juegos(){
        return $this->hasMany(Juegos::class); 
    }
}
