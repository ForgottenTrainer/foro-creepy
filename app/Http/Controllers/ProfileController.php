<?php

namespace App\Http\Controllers;

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
        $post = Post::all();
        $authUserId = Auth::id(); 

        return view('userPage.index', compact('id', 'user', 'post', 'authUserId', 'social'));
    }
    public function create($id)
    {
        $user = User::findOrFail($id);
        return view('userPage.show', compact('user'));
    }
}
