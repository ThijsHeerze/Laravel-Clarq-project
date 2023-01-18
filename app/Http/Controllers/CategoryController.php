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
            'category'=>$category
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('category.create')->with([
            'categories'=>$categories,
        ]);
    }

    public function store(UpdateCategoryRequest $request)
    {
        Category::create([
            'user_id' => $request->get('user_id'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'deadline' => $request->get('deadline')
        ]);
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = Category::where('id', $id)->first();
        if (is_null($category)) {
            return abort(404, 'error');
        }
        return view('category.show')->with([
            'category' =>$category
        ]);
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('category.edit')->with([
            'category'=>$category
        ]);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::where('id', $id)->first();
        $category->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'deadline' => $request->get('deadline')
        ]);
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index');
    }
}
