<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    protected $table = "entrenador";
    protected $fillable=[
        'nombre',
        'apellido'
    ];
    public $timestamps=false;
}
