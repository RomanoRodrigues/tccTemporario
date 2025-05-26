<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;
use Illuminate\Http\Request;
use App\Models\Medico;

class MedicoController extends Controller
{
    public function index(){
        $medicos = Medico::orderByDesc('id_medico')->get();
        return view('medico.index', ['medicos' => $medicos]);
    }

    public function mostrar(Medico $medico){
        return view('medico.mostrar', ['medico' => $medico]);
    }

    public function criar(){
        return view('medico.criar');
    }

    public function store(MedicoRequest $req){
        // Aqui vai validar o formulário
        //  dd($req->all());
        
        $req->validated();
        //dd($req->all());
        Medico::create([
            'nome' => $req->nome,
            'telefone' => $req->telefone,
            'email' => $req->email,
            'endereco' => $req->endereco,
            'cpf' => $req->cpf,
            'senha' =>$req->senha
        ]);

       return redirect()->route('medico.index')->with('Sucesso!', 'Usuário cadastrado com sucesso!');
    }

    public function editar(Medico $medico){
        return view('medico.editar', ['medico' => $medico]);
    }

    public function update(MedicoRequest $req, Medico $medico){
        $req->validated();
       $medico->update([
            'nome' => $req->nome,
            'telefone' => $req->telefone,
            'email' => $req->email,
            'endereco' => $req->endereco,
            'cpf' => $req->cpf,
            'senha' =>$req->senha
        ]);
        return redirect()->route('medico.mostrar', ['medico' => $medico->id_medico])->with('Sucesso!', 'Usuário atualizado com sucesso!');
    }

    public function deletar(Medico $medico){
        $medico->update([
            'nome' => '',
            'telefone' => '',
            'email' => uniqid(),
            'endereco' => '',
            'cpf' => uniqid(),
        ]);
        $medico->delete();
         return redirect()->route('medico.index')->with('Sucesso!', 'Usuário apagado com sucesso!');
    }
}
