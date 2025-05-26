<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model{

    use SoftDeletes; // <- Habilita exclusão lógica

    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';
    public $incrementing = true;

    protected $fillable = [
        'nome', 'telefone', 'email', 'endereco', 'cpf', 'senha',
    ];

    protected $dates = ['deleted_at']; // <- trata deleted_at como data
}
