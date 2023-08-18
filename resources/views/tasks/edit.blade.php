@extends('site.master')
@section('title', 'Editar Tarefa')

@section('navbar-links')
    @if (auth()->check())
        <a href="{{ route('site.logout') }}" class="btn btn-danger me-2">Logout</a>
    @endif
@endsection

@section('content')
    <div class="container mt-5">
        <h1>Editar Tarefa</h1>
        <hr>
        <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" name="title" value="{{ $task->title }}"
                    placeholder="Digite o título..">
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" name="description" value="{{ $task->description }}"
                    placeholder="Digite a descrição..">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
    </div>
    </form>
    </div>

@endsection
