<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarrpt extends Model {
    protected $table = 'rpt';
    protected $fillable = [
        'nome',
        'versao',
        'tela',
        'segmento',
        'data',
        'hora',
        'endereco',
        'cliente'
    ];

    protected $casts = [
        'data' => 'date',
    ];
}
