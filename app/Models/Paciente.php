<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model implements AuthenticableContract
{

    use SoftDeletes, Authenticatable; // <- Habilita exclusão lógica

    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';
    public $incrementing = true;

    protected $fillable = [
        'nome', 'telefone', 'email', 'endereco', 'cpf', 'senha',
    ];

    public function getAuthPassword()
    {
        return $this->senha;
    }

    protected $dates = ['deleted_at']; // <- trata deleted_at como data
}
