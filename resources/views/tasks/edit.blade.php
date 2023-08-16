@extends('/site/master')

@section('content')
    <h2>Editar Tarefa</h2>
    
    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PATCH')
        
        <div class="mb-3">
            <label for="title" class="form-label">Título da Tarefa</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
        </div>
        
        <!-- Outros campos da task -->
        
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
