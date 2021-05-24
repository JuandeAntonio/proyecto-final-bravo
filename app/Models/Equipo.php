<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    //Relacion uno a muchos

    public function jugador(){
        return $this->hasMany(Jugador::class);
    }
    public function partido(){
        return $this->hasMany(Partido::class);
    }

    //Relacion uno a muchos inversa

    public function liga(){
        return $this->belongsTo(Liga::class);
    }

    //Relacion uno a uno

    public function estadistica(){
        return $this->hasOne(Estadistica::class);
    }
}

