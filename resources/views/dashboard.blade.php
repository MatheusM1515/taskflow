@extends('index')
@section('conteudo')

<div class="dashboard-container">

    @php
        $pendentes = $tasks->where('status', 'pendente')->count();
        $concluidas = $tasks->where('status', 'concluida')->count();
        $total = $tasks->count();
        $percent = $total > 0 ? round(($concluidas / $total) * 100) : 0;
    @endphp

    <!-- CARDS EM CIMA -->
    <div class="stats">

        <div class="stat-card pending">
            <div class="stat-top">
                <span>📌 Pendentes</span>
            </div>
            <p>{{ $pendentes }}</p>
        </div>

        <div class="stat-card done">
            <div class="stat-top">
                <span>✅ Concluídas</span>
            </div>
            <p>{{ $concluidas }}</p>
        </div>

        <div class="stat-card progress">
            <div class="stat-top">
                <span>🚀 Progresso</span>
            </div>

            <p>{{ $percent }}%</p>

            <div class="progress-bar">
                <div class="progress-fill" style="width: {{ $percent }}%"></div>
            </div>
        </div>

    </div> 

    <!-- CARD PRINCIPAL -->
    <div class="dashboard-card">

        <div class="header">
            <h2>📋 Minhas Tarefas</h2>
            <a href="/logout" class="logout">Sair</a>
        </div>

        <form method="POST" action="/tasks" class="task-form">
            @csrf
            <input type="text" name="titulo" placeholder="Digite uma nova tarefa..." required>
            <button type="submit">Adicionar</button>
        </form>

        <ul class="task-list">
            @foreach($tasks as $task)
                <li class="task-item">
                    <span class="{{ $task->status == 'concluida' ? 'done' : '' }}">
                        {{ $task->titulo }}
                    </span>

                    <div class="actions">
                        <a href="/tasks/{{ $task->id }}" class="check">✔</a>
                        <a href="/delete/{{ $task->id }}" class="delete">✖</a>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>

</div>

@endsection