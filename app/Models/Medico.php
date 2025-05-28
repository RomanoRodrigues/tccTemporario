<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model implements AuthenticableContract
{
    use SoftDeletes, Authenticatable; // <- Habilita exclusão lógica

    protected $table = 'medicos';
    protected $primaryKey = 'id_medico';
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
