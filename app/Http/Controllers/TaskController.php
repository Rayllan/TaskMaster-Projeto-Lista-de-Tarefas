<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tasks = $user->tasks;

        return view('tasks.index', compact('tasks'));
    }
    
    public function create()
    {
        return view('tasks.create');
    }
    
    public function store(Request $request)
    {
        $user = auth()->user();
    
        $task = new Task([
            'title' => $request->input('title'),
            'description' => $request->input('description'), // Adicione essa linha para salvar a descrição
            'status' => $request->input('status', 0), // Defina um valor padrão para o status caso não seja marcado
        ]);
    
        $user->tasks()->save($task);
    
        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso.');
    }
    
    /*
    $user = auth()->user();
    $tasks = $user->tasks;
    
    return view('tasks.index', compact('tasks'));
    */
    /*
    
    
    public function show(Task $task)
    {
        // Verifica se o usuário é o proprietário da task
        $this->authorize('view', $task);
    
        return view('tasks.show', compact('task'));
    }
    
    public function update(Request $request, Task $task)
    {
        // Verifica se o usuário é o proprietário da task
        $this->authorize('update', $task);

        $task->update([
            'title' => $request->input('title'),
            // outros campos da task
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task atualizada com sucesso.');
    }

    public function destroy(Task $task)
    {
        // Verifica se o usuário é o proprietário da task
        $this->authorize('delete', $task);

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task removida com sucesso.');
    }
*/
}
