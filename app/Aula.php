<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'aulas';
    protected $fillable = ['id','nombre'];

    public function usuarios(){
    	return $this->belongsToMany('App\Usuario');
    }
    public function equipos(){
    	return $this->hasMany('App\Equipo');
    }


    public $timestamps = false;
}
