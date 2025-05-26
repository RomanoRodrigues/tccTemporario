<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use SoftDeletes; // <- Habilita exclusão lógica

    protected $table = 'medicos';
    protected $primaryKey = 'id_medico';
    public $incrementing = true;

    protected $fillable = [
        'nome', 'telefone', 'email', 'endereco', 'cpf', 'senha',
    ];

    protected $dates = ['deleted_at']; // <- trata deleted_at como data
}
