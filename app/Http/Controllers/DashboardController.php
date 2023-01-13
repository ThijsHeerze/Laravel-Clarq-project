<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        // alleen tasks van de user waarvan je bent ingelogd
        $task = Task::all();
        return view('dashboard.index')->with([
            'tasks'=>$task
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        Task::create([
            'user_id' => $request->get('user_id'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'deadline' => $request->get('deadline')
        ]);
        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        $task = Task::where('id', $id)->first();
        if (is_null($task)) {
            return abort(404, 'error');
        }
        return view('task.show')->with([
            'task' =>$task
        ]);
    }

    public function edit($id)
    {
        $task = Task::where('id', $id)->first();
        return view('task.edit')->with([
            'task'=>$task
        ]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::where('id', $id)->first();
        $task->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'deadline' => $request->get('deadline')
        ]);
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect()->route('tasks.index');
    }
}
