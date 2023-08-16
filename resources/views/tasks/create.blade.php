@extends('site.master')
@section('title', 'Criar Tarefas')

@section('navbar-links')
    @if (auth()->check())
        <a href="{{ route('site.logout') }}" class="btn btn-danger me-2">Logout</a>
    @endif
@endsection

@section('content')
    <div class="container mt-5">
        <h1>Nova Tarefa</h1>
        <hr>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" name="title" placeholder="Digite o título..">
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" name="description" placeholder="Digite a descrição..">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="status" value="1">
                    <label class="form-check-label" for="status">Concluída</label>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Salvar">
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
