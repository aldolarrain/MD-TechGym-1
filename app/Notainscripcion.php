<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notainscripcion extends Model
{
    protected $table = "notainscripcion";
    protected $fillable=[
        'fecha',
        'id_cliente'
    ];

    public $timestamps=false;
    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }
}
