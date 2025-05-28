<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() { // a visão que pede usuário e senha
        return view('home');
    }

    public function entrar(Request $req) {
        $dados = $req->all();
        $erro = 'Preencha todos os campos antes de entrar!';
        if ($req->input('tipo') == "medico") {
            if(Auth::guard('medico')->attempt( [ 'email' => $dados['email'], 'password' => $dados['senha'] ] ))
                return redirect()->route('medico.mostrar', ['medico' => Auth::guard('medico')->user()->id_medico]);
            else {
                    $erro = 'Dados Inválidos!';
                    return view('home', ['erro' => $erro]);
                }
        }
        else if ($req->input('tipo') == "paciente") {
            if (Auth::guard('paciente')->attempt( [ 'email' => $dados['email'], 'password' => $dados['senha'] ] ))
                return redirect()->route('paciente.mostrar', ['paciente' => Auth::guard('paciente')->user()->id_paciente]);
            else {
                $erro = 'Dados Inválidos!';
                return view('home', ['erro' => $erro]);
            }
        }
        else 
            return view('home', ['erro' => $erro]);
    }

    public function sair() {
        if (Auth::guard('medico')->check())
            Auth::guard('medico')->logout();
        if (Auth::guard('paciente')->check())
            Auth::guard('paciente')->logout();
        return redirect()->route('home');
    }
    
}
