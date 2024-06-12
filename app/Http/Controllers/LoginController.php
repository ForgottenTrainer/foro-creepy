<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        $user->status = "user";

        $user->save();

        Auth::login($user);

        return redirect(route('index.home'));
    }

    public function registerAdminCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:1024|nullable' 

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = "admin";

        if ($request->hasFile('avatar')) {

            if ($user->avatar) {
                File::delete(public_path($user->avatar));
            }

            $image = $request->file('avatar');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/perfil'), $imageName); 
            $user->avatar = 'images/perfil/' . $imageName; 
        }

        $user->save();


        return redirect()->back()->with('success','Un nuevo admin ha sido creado');
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

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->image) {
            File::delete(public_path($user->image));
        }

        $user->delete();

        return redirect()->back()->with('success', 'El Usuario se ha eliminado correctamente');
    }
}
