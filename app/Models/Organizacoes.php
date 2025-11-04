<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizacoes extends Model {
    protected $table = 'organizacao';
    protected $fillable = [
        'nome',
        'segmento',
    ];
}
