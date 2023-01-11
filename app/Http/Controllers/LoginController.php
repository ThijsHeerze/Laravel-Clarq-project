<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    public function index()
    {
        $login = Login::all();
        return view('login.index')->with([
            'logins'=>$login
        ]);
    }

    public function create()
    {
        $login = Login::all();
        return view('login.index')->with([
            'login'=>$login
        ]);
    }

    public function store(Request $request)
    {
        Login::create([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        return redirect()->route('logins.index');
    }

    public function show($id)
    {
        $login = Login::all();
        return view('login.index')->with([
            'login'=>$login
        ]);
    }

    public function edit($id)
    {
        $login = Login::all();
        return view('login.index')->with([
            'login'=>$login
        ]);
    }

    public function update(Request $request, $id)
    {
        $login = Login::all();
        return view('login.index')->with([
            'login'=>$login
        ]);
    }

    public function destroy($id)
    {
        $login = Login::all();
        return view('login.index')->with([
            'login'=>$login
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $email = Email::get();
        $password = Password::get();
        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            // Authentication was successful...
        }

        if (Auth::attempt([
            'email' => $email,
            'password' => $password,
            fn($query) => $query->has('activeSubscription'),
        ]))
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('login.index');
        }
    }
}
