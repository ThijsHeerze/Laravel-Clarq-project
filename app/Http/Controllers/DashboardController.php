<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        // haalt alleen tasks op van de user die is ingelogd
        $task = Task::where('user_id', auth()->user()->id)->get();
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
        return redirect()->route('dashboard.index');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('dashboard.show')->with([
            'task' =>$task
        ]);
    }

    public function edit($id)
    {
        //The Laravel Eloquent first() method will help us to return the first record found from the database
        $task = Task::findOrFail($id);
        return view('dashboard.edit')->with([
            'task'=>$task
        ]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'deadline' => $request->get('deadline')
        ]);
        return redirect()->route('dashboard.index');
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect()->route('dashboard.index');
    }
}
