<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use App\Models\Post;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    //
    public function index($id)
    {
        $social = SocialMedia::all();
        $user = User::findOrFail($id);
        $users = User::all();
        $post = Post::all();
        $authUserId = Auth::id(); 
        $comentario = Comentarios::orderByDesc('created_at')->paginate(1);


        return view('userPage.index', compact('id', 'user', 'post', 'authUserId', 'social', 'comentario', 'users'));
    }
    public function create($id)
    {
        $user = User::findOrFail($id);
        return view('userPage.show', compact('user'));
    }
}
