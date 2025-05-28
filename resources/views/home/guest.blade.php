<div>
    <h3>Entrar</h3>
    <div class="row">
        <form action="{{route('login.entrar')}}" method="post">
            {{ csrf_field() }}
            <div>
                <label>E-mail</label>
                <br>
                <input type="text" name="email">
            </div>
            <div>
            <label>Senha</label>
                <br>
                <input type="password" name="senha">
            </div>
            <div>
                <label>
                    médico
                    <input type="radio" name="tipo" value="medico">
                </label>
                <label>
                    paciente
                    <input type="radio" name="tipo" value="paciente">
                </label>
            </div>
            <button class="btn deep-orange">Entrar</button>
        </form>
        <br>
            <div>{{ $erro }}</div>
    </div>
</div>