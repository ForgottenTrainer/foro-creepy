<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    //
    public function login()
    {
        return view('login.login');
    }

    public function register()
    {
        return view('login.register');
    }

    public function registerCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);

        return redirect(route('index.home'));
    }

    public function log(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect('/');

        } else 
        {
            return redirect(route('index.login'))->with('error', 'Credenciales inválidas');

        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect(route('index.home'));
        
    }
}
