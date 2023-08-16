@extends('/site/master')

@section('content')
    <h2>Detalhes da Tarefa</h2>
    
    <p><strong>Título:</strong> {{ $task->title }}</p>
    <!-- Outros campos da task -->
    
    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Editar</a>
    
    <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
@endsection
