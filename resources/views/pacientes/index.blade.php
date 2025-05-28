<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <a href="{{ route('paciente.criar') }}">Cadastrar</a><br>
    <a href="{{ route('login.sair') }}">Sair</a><br>

    <h2>Listar Pacientes</h2>

    @if(session('Sucesso!'))
        <p style="color: #086">
            {{ session('Sucesso!') }}
        </p>
    @endif
    
    @foreach ($pacientes as $paciente)
        ID: {{ $paciente->id_paciente }}<br>
        Nome: {{ $paciente->nome }}<br>
        Telefone: {{ $paciente->telefone }}<br>
        Email: {{ $paciente->email }}<br>
        Endereco: {{ $paciente->endereco }}<br>
        CPF: {{ $paciente->cpf }}<br>
        <a href="{{ route('paciente.mostrar', ['paciente' => $paciente])}}">Visualizar</a><br>
        <a href="{{ route('paciente.editar', ['paciente' => $paciente])}}">Editar</a><br>
        <form method="POST" action="{{ route('paciente.deletar', ['paciente' => $paciente]) }}">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Tem certeza de que deseja apagar esse registro?')">Apagar</button>
        </form>
        <hr>
    @endforeach
</body>
</html>