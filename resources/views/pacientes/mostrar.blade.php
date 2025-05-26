<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURD</title>
</head>
<body>
    <a href="{{ route('paciente.index')}}">Listar</a><br>
    <a href="{{ route('paciente.editar', ['paciente' => $paciente->id_paciente]) }}">Editar</a>
    <h2>Visualizar usuario</h2>

    @if(session('Sucesso!'))
        <p style="color: #086">
            {{ session('Sucesso!') }}
        </p>
    @endif

    ID: {{ $paciente->id_paciente }}<br>
    Nome: {{ $paciente->nome }}<br>
    Telefone: {{ $paciente->telefone }}<br>
    Email: {{ $paciente->email }}<br>
    Endereco: {{ $paciente->endereco }}<br>
    CPF: {{ $paciente->cpf }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($paciente->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($paciente->updated_at)->format('d/m/Y H:i:s') }}<br>
</body>

</html>
