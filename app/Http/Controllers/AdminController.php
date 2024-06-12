<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::orderBy("created_at","desc")->paginate(5);
        $posts = Post::all();
        return view('admin.index', compact('users', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.forms');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        $users = User::orderBy("created_at","desc")->paginate(10);
        return view('admin.tables', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function report_user(Request $request,  $id)
    {
        $user = User::find($id);
        if($user){
            $user->report = true;
        }

        if ($user->save()) {
            return redirect()->back()->with('message', 'Bloqueado exitosamente');
        } else {
            return redirect()->back()->with('error', 'Algo salió mal');
        }
        
    }
    
    public function unlock_user(Request $request,  $id)
    {
        $user = User::find($id);
        if($user){
            $user->report = false;
        }

        if ($user->save()) {
            return redirect()->back()->with('message', 'Desbloqueado exitosamente');
        } else {
            return redirect()->back()->with('error', 'Algo salió mal');
        }
        
    }

    public function report(Admin $admin)
    {
        $reports = Report::all();

        return view('admin.reportes',compact('reports'));
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
