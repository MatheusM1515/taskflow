@extends('index')
@section('conteudo')

<div class="login-container">
    <h2>Login</h2>
    <p class="subtitle">Acesse sua conta</p>

    @if ($errors->any())
        <div style="color:red; margin-bottom:10px;">
            @foreach ($errors->all() as $erro)
                <p>{{ $erro }}</p>
            @endforeach
        </div>
    @endif

    @if(session('erro'))
        <p style="color:red; margin-bottom:10px;">{{ session('erro') }}</p>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Digite seu email" required>
        </div>

        <div class="input-group">
            <label>Senha</label>
            <input type="password" name="senha" placeholder="Digite sua senha" required>
        </div>

        <button type="submit">Entrar</button>
    </form>

    <a href="/register">Criar conta</a>
</div>

@endsection