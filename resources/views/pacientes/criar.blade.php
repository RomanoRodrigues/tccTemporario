<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <a href="{{ route('paciente.index') }}">Listar</a><br>

    <h2>Cadastrar paciente</h2>  
    
    <form action="{{route('paciente-store')}}" method="POST">
        @if($errors->any())
            @foreach($errors->all() as $erro)
                <p style="color: #f00;">
                    {{ $erro }}
                </p>
            @endforeach
        @endif

        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Nome completo" value="{{ old('nome') }}"><br><br>

        <label>Telefone: </label>
        <input type="text" name="telefone" placeholder="Melhor telefone do paciente" value="{{ old('telefone') }}"><br><br>

        <label>Email: </label>
        <input type="email" name="email" placeholder="Melhor email do paciente" value="{{ old('email') }}"><br><br>

        <label>Endereco: </label>
        <input type="text" name="endereco" placeholder="Coloque o melhor endereco do paciente" value="{{ old('endereco') }}"><br><br>

        <label>CPF: </label>
        <input type="text" name="cpf" placeholder="Coloque o CPF do paciente" value="{{ old('cpf') }}"><br><br>

        <label>Senha: </label>
        <input type="password" name="senha" placeholder="Senha" value="{{ old('senha') }}"><br><br>

        <button type="submit">Cadastrar</button>
    
    </form>

</body>
</html>
