<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    use HasFactory;
    
    //Relacion uno a muchos

    public function equipos(){
        return $this->hasMany(Equipo::class);
    }
}

