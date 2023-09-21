<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes';

    public function psicologos()
    {
        return $this->belongsTo(Usuario::class, 'sicologo_id');
    }
}
