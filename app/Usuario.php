<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['dni','nombre','apellido','email','edad'];
    public function aulas(){
    	return $this->belongsToMany('App\Aula');
    }

    public $timestamps = false;
}
