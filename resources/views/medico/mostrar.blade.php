<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURD</title>
</head>
<body>
    <a href="{{ route('medico.index')}}">Listar</a><br>
    <a href="{{ route('medico.editar', ['medico' => $medico->id_medico]) }}">Editar</a>
    <h2>Visualizar usuario</h2>

    @if(session('Sucesso!'))
        <p style="color: #086">
            {{ session('Sucesso!') }}
        </p>
    @endif

    ID: {{ $medico->id_medico }}<br>
    Nome: {{ $medico->nome }}<br>
    Telefone: {{ $medico->telefone }}<br>
    Email: {{ $medico->email }}<br>
    Endereco: {{ $medico->endereco }}<br>
    CPF: {{ $medico->cpf }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($medico->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($medico->updated_at)->format('d/m/Y H:i:s') }}<br>
</body>

</html>
