<?php

namespace Database\Seeders;

use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $dados = [
            'nome' => 'medico',
            'telefone' => '10 987654321',
            'email' => 'medico@medico.com',
            'endereco' => 'rua venceslau braz jr',
            'cpf' => '477.837.483-82',
            'senha' => bcrypt('1234')
        ];

        Medico::create($dados);

        $dados = [
            'nome' => 'paciente',
            'telefone' => '11 997764333',
            'email' => 'paciente@paciente.com',
            'endereco' => 'rua alexandre de sa',
            'cpf' => '323.554.789-92',
            'senha' => bcrypt('1234')
        ];

        Paciente::create($dados);
    }

    //'nome', 'telefone', 'email', 'endereco', 'cpf', 'senha',
}
