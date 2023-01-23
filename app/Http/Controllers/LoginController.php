<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\UpdateUserRequest;
use Session;
use Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.index');
    }

    protected function guard()
    {
        return Auth::guard('guard-name');
    }

    public function postLogin(Request $request)
    {
        //valideren, bevestigen
        $request->validate([
            //voorwaarden
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        //authenticatie
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        $request->session()->flash('status', 'Wrong combination');
        return redirect()->route('login.index');
    }

    public function logout()
    {
        //session destroy
        Session::flush();
        Auth::logout();

        return Redirect('login.index');
    }
}

//    public function create()
//    {
//        $login = Login::all();
//        return view('login.index')->with([
//            'login'=>$login
//        ]);
//    }
//
//    public function store(Request $request)
//    {
//        $login = Login::all();
//        $validated = $request->validate([
//            'title' => 'required|unique:posts|max:255',
//            'body' => 'required',
//        ]);
//        return view('login.index')->with([
//            'login'=>$login
//        ]);
//
//        Login::create([
//            'email' => $request->get('email'),
//            'password' => $request->get('password'),
//        ]);
//
//        return redirect()->route('logins.index');
//    }
//
//    public function show($id)
//    {
//        $login = Login::all();
//        return view('login.index')->with([
//            'login'=>$login
//        ]);
//    }
//
//    public function edit($id)
//    {
//        $login = Login::all();
//        return view('login.index')->with([
//            'login'=>$login
//        ]);
//    }
//
//    public function update(Request $request, $id)
//    {
//        $login = Login::all();
//        return view('login.index')->with([
//            'login'=>$login
//        ]);
//    }
//
//    public function destroy($id)
//    {
//        $login = Login::all();
//        return view('login.index')->with([
//            'login'=>$login
//        ]);
//    }

//    public function authenticate(Request $request)
//    {
//        $credentials = $request->validate([
//            'email' => ['required', 'email'],
//            'password' => ['required'],
//        ]);
//        $email = Email::get();
//        $password = Password::get();
//        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
//            // Authentication was successful...
//        }
//
//        if (Auth::attempt([
//            'email' => $email,
//            'password' => $password,
//            fn($query) => $query->has('activeSubscription'),
//        ]))
//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//
//            return redirect()->intended('login.index');
//        }
//    }
//}
