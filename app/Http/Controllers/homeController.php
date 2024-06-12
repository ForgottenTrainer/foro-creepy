<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class homeController extends Controller
{
    //
    public function index ()
    {
        $posts = Post::orderBy("created_at","desc")->paginate(10);
        $user = User::all();

        return view('home.index', compact('posts','user'));
    }

    public function show ($id)
    {


        if(Auth::user()->status == 'admin')
        {
            $user = User::where('id', $id)->get();

            return view('home.show', compact('user','id'));
        }
        if (Auth::id() != $id) {
            abort(403); 
        }
        $user = User::where('id', $id)->get();

        return view('home.show', compact('user','id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'nullable', 
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:1024|nullable' 
        ]);
    
        $user = User::findOrFail($id); 
    
        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
    
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
    
        return redirect()->route('index.home');
    }

    public function search(Request $request){
        $busqueda = $request->input('buscado', ''); 
        $user = User::all();

        $posts = Post::where('titulo', 'like', '%' . $busqueda . '%')->get();
    
        return view('home.search', ['posts' => $posts, 'user' => $user]);
    }
}
