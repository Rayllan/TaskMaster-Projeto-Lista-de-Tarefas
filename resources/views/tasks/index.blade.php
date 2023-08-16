@extends('site.master')
@section('title', 'Lista de Tarefas')

@section('navbar-links')
    @if (auth()->check())
        <a href="{{ route('site.logout') }}" class="btn btn-danger me-2">Logout</a>
    @endif
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-10">
                <h2>Lista de Tarefas</h2>
            </div>
            <div class="col-sm-2">
                @if (auth()->check())
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Nova Tarefa</a>
                @endif
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (auth()->check())
            <div class="form-group">
                <a href="{{ route('site.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        @endif
    </div>
@endsection
