<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Password;

class PasswordController extends Controller
{
    public function index()
    {
        $hashed = Hash::make('password', [
            'rounds' => 12,
        ]);
    }

    public function create()
    {
        $hashed = Hash::make('password', [
            'rounds' => 12,
        ]);
    }

    public function store(Request $request)
    {
        Password::create([
            'password' => $request->get('password')
        ]);
//        if ($password=filled('password')){
//            $password = Hash::make('secret');
//        }
    }

    public function show($id)
    {
        $password = Password::where('id', $id)->first();
        return view('user.show')->with([
            'password' => $password
        ]);
        if (Hash::needsRehash($hashed)) {
            $hashed = Hash::make('plain-text');
        }
    }

    public function edit($id)
    {
        $password = Password::where('id', $id)->first();

        return redirect()->route('users.index');
    }

    public function update(Request $request, $id)
    {
        $request->user()->fill([
            'password' => Hash::make($request->$id->newPassword)
        ])->save();
    }

    public function destroy($id)
    {
        //
    }
}
