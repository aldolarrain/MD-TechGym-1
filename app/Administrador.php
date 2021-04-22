<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = "administrador";
    protected $fillable=[
        'nombre',
        'apellido',
        "contrasenia"

    ];

    public $timestamps=false;
}
