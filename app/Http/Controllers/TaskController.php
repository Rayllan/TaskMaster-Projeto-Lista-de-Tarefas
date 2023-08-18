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
            'description' => $request->input('description'),
            'status' => $request->input('status', 0),
        ]);

        $user->tasks()->save($task);

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso.');
    }

    public function edit($id)
    {
        $task = Task::where('id', $id)->first();
        if (!empty($task)) {
            return view('tasks.edit', ['task' => $task]);
        } else {
            return redirect()->route('tasks.index');
        }
    }

    public function update(Request $request, $id)
{
    $task = Task::find($id);

    if (!$task) {
        return redirect()->route('tasks.index')->with('error', 'Tarefa não encontrada.');
    }

    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $task->update([
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'status' => $request->input('status') === 'concluída' ? true : false,
    ]);

    return redirect()->route('tasks.index')->with('success-att', 'Tarefa atualizada com sucesso.');
}



    public function destroy($id)
    {

        Task::where('id', $id)->delete();
        return redirect()->route('tasks.index')->with('alert', 'Tarefa removida com sucesso.');
    }
}
