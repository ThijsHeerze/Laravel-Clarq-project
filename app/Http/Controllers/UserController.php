<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('user.index')->with([
            'users' => $user
        ]);
    }

    public function create(){
        $user = User::all();
        return view('user.create')->with([
            'user' => $user
        ]);
    }

    public function store(Request $request){
        $password = $request->get('password');
        $hashed = Hash::make($password);
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $hashed
        ]);
        return redirect()->route('users.index');
    }

    public function show($id){
        $user = User::where('id', $id)->first();
        if (is_null($user)) {
            return abort(404, 'error');
        }
        return view('user.show')->with([
            'user' => $user,
        ]);
    }

    public function edit($id){
        $user = User::where('id', $id)->first();
        return view('user.edit')->with([
            'user'=>$user
        ]);
    }

    public function update(Request $request, $id){
        $user = User::where('id', $id)->first();
        $password = $request->get('password');
        $hashed = Hash::make($password);
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $hashed
        ]);
        return redirect()->route('users.index');
    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->route('users.index');
    }
}
