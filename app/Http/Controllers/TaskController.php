<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTaskRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use function GuzzleHttp\Promise\all;

class TaskController extends Controller
{
    public function index()
    {
        $task = Task::with([
            'categories'
        ])->get();
        return view('task.index')->with([
            'tasks'=>$task,
        ]);
    }

    public function create()
    {
        $user = User::all();
        $category = Category::all();
        return view('task.create')->with([
            'users'=>$user,
            'categories'=>$category
        ]);
    }

    public function store(UpdateTaskRequest $request)
    {
        $task = Task::create([
            'user_id' => $request->get('user_id'),
            'name' => $request->get('name'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'deadline' => $request->get('deadline')
        ]);
        //
        $task->categories()->sync($request->get('category_id') ?? []);
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
        //Edit is for displaying a form to apply changes
    {
        $category = Category::all();
        $task = Task::where('id', $id)->first();
        return view('task.edit')->with([
            'task'=>$task,
            'categories'=>$category
        ]);
    }

    public function update(Request $request, $id)
        //Update is used to set them up to server
    {
        $task = Task::where('id', $id)->first();
        $task->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'deadline' => $request->get('deadline')
        ]);
        //
        $task->categories()->sync($request->get('category_id'));
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect()->route('tasks.index');
    }
}
