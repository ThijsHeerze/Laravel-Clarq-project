<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category.index')->with([
            'categories'=>$category
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->get('name'),
        ]);
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $task = Task::all();
        $category = Category::findOrFail($id);
        return view('category.show')->with([
            'category' => $category,
            'task' => $task
        ]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit')->with([
            'category'=>$category
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->get('name'),
        ]);
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index');
    }
}
