<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoinscripcion extends Model
{
    protected $table = "tipoinscripcion";
    protected $fillable=[
        'nombre',
        'precio',
        'periodo',
        'frecuencia'

    ];

    public $timestamps=false;
}
