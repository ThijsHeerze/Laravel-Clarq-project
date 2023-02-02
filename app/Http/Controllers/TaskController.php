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
        //haalt alle taken op
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
        //het syngroniseren van categories vanuit task, maakt een request aan en haalt de category_id op
        //Null coalescing. Bij '??' word de eerste uitdrukking slechts een keer geëvalueerd
        $task->categories()->sync($request->get('category_id') ?? []);
        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        //haalt task op met de id
        $task = Task::findOrFail($id);
        return view('task.show')->with([
            'task' =>$task
        ]);
    }

    public function edit($id)
        //Edit is voor het weergeven van een formulier om te kunnen editen
    {
        //haalt alle categorieën op
        $category = Category::all();
        $task = Task::findOrFail($id);
        return view('task.edit')->with([
            'task'=>$task,
            'categories'=>$category
        ]);
    }

    public function update(Request $request, $id)
        //Update is used to set them up to server
    {
        $task = Task::findOrFail($id);
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
