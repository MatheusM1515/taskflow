@extends('index')
@section('conteudo')

<div class="login-container">
    <h2>Cadastro</h2>
    <p class="subtitle">Crie sua conta</p>

    @if ($errors->any())
        <div style="color:red; margin-bottom:10px;">
            @foreach ($errors->all() as $erro)
                <p>{{ $erro }}</p>
            @endforeach
        </div>
    @endif

    @if(session('sucesso'))
        <p style="color:green; margin-bottom:10px;">{{ session('sucesso') }}</p>
    @endif

    <form method="POST" action="/register">
        @csrf
    
        <div class="input-group">
            <label>Nome</label>
            <input type="text" name="nome" placeholder="Digite seu nome" required>
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Digite seu email" required>
        </div>

        <div class="input-group">
            <label>Senha</label>
            <input type="password" name="senha" placeholder="Digite sua senha" required>
        </div>

        <button type="submit">Cadastrar</button>
    </form>

    <a href="/login">Já tenho conta</a>
</div>

@endsection