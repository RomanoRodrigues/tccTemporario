<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest as RequestsPacienteRequest;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Requests\PacienteRequest;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    public function index(){
        //Carregar VIEW -> Dps vamos usar API, em um primeiro momento, teste
        $pacientes = Paciente::orderByDesc('id_paciente')->get();


        return view('pacientes.index', ['pacientes' => $pacientes]);
    }

    public function mostrar(Paciente $paciente){
        return view('pacientes.mostrar', ['paciente' => $paciente]);
    }

    public function criar(){
        return view('pacientes.criar');
    }

    public function store(RequestsPacienteRequest $req){
        // Aqui vai validar o formulário
        //  dd($req->all());
        
        $req->validated();
        //dd($req->all());
        Paciente::create([
            'nome' => $req->nome,
            'telefone' => $req->telefone,
            'email' => $req->email,
            'endereco' => $req->endereco,
            'cpf' => $req->cpf,
            'senha' =>$req->senha
        ]);

       return redirect()->route('paciente.index')->with('Sucesso!', 'Usuário cadastrado com sucesso!');
    }

    public function editar(Paciente $paciente){
        return view('pacientes.editar', ['paciente' => $paciente]);
    }

    public function update(RequestsPacienteRequest $req, Paciente $paciente){
        $req->validated();
       $paciente->update([
            'nome' => $req->nome,
            'telefone' => $req->telefone,
            'email' => $req->email,
            'endereco' => $req->endereco,
            'cpf' => $req->cpf,
            'senha' =>$req->senha
        ]);
        return redirect()->route('paciente.mostrar', ['paciente' => $paciente->id_paciente])->with('Sucesso!', 'Usuário atualizado com sucesso!');
    }

    public function deletar(Paciente $paciente){
        $paciente->update([
            'nome' => '',
            'telefone' => '',
            'email' => uniqid(),
            'endereco' => '',
            'cpf' => uniqid(),
        ]);
        $paciente->delete();
         return redirect()->route('paciente.index')->with('Sucesso!', 'Usuário apagado com sucesso!');
    }
}
