<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    /** Relacion 1:1 de Perfil con Usuario
     es como si pusieramos Perfil::find(1)    esto nos trae el usuario
     */
    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
