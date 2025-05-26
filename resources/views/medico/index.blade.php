<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <a href="{{ route('medico.criar') }}">Cadastrar</a><br>
    <a href="{{ route('home') }}">Voltar a página inicial</a><br>

    <h2>Listar Medicos</h2>

    @if(session('Sucesso!'))
        <p style="color: #086">
            {{ session('Sucesso!') }}
        </p>
    @endif
    
    @foreach ($medicos as $medico)
        ID: {{ $medico->id_medico }}<br>
        Nome: {{ $medico->nome }}<br>
        Telefone: {{ $medico->telefone }}<br>
        Email: {{ $medico->email }}<br>
        Endereco: {{ $medico->endereco }}<br>
        CPF: {{ $medico->cpf }}<br>
        <a href="{{ route('medico.mostrar', ['medico' => $medico])}}">Visualizar</a><br>
        <a href="{{ route('medico.editar', ['medico' => $medico])}}">Editar</a><br>
        <form method="POST" action="{{ route('medico.deletar', ['medico' => $medico]) }}">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Tem certeza de que deseja apagar esse registro?')">Apagar</button>
        </form>
        <hr>
    @endforeach
</body>
</html>