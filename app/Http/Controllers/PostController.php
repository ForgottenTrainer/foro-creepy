<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        return view('home.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'subtitulo' => 'max:255',
            'descripcion' => 'required|min:50',
            'id_perfil' => 'required',
            'image'
        ]);

        $post = new Post();
        $post->id_perfil = $request->id_perfil;
        $post->titulo = $request->titulo;
        $post->subtitulo = $request->subtitulo;
        $post->descripcion = $request->descripcion;
        $post->categoria = $request->categoria;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $dest = 'images/post';
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move($dest, $filename);
            $post->image = $dest . '/' . $filename;
        }

        $post->save();

        return redirect(route('index.home'));
    }

    public function show($id)
    {
        $user = User::all();
        $post = Post::where('id', $id)->get();
        $comentario = Comentarios::all();

        return view('posts.show', compact('post', 'comentario', 'user'));
    }

    public function table($id)
    {
        $perfilId = $id; 
        if (Auth::id() != $perfilId) {
            abort(403); 
        }

        $post = Post::where('id_perfil', $perfilId)->get();

        return view('posts.index', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->get();

        return view('posts.update', compact('post'));
    }
    
    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'subtitulo' => 'max:255',
            'descripcion' => 'required|min:50',
            'id_perfil' => 'required',
        ]);
        
        $post = Post::find($id); 
        
        if ($post) {
            $post->id_perfil = $request->id_perfil;
            $post->titulo = $request->titulo;
            $post->subtitulo = $request->subtitulo;
            $post->descripcion = $request->descripcion;
            $post->categoria = $request->categoria;
        
            if ($request->hasFile('image')) {
                // Eliminar la imagen antigua si existe
                if ($post->image) {
                    File::delete(public_path($post->image));
                }
                // Guardar la nueva imagen
                $file = $request->file('image');
                $dest = 'images/post';
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move($dest, $filename);
                $post->image = $dest . '/' . $filename;
            }
        
            $post->save();
        
            return redirect()->back()->with('success', 'El post se ha actualizado correctamente');
        } else {
            return redirect()->back()->with('error', 'No se encontró el post que intentas actualizar');
        }
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->image) {
            File::delete(public_path($post->image));
        }

        $post->delete();

        return redirect()->back()->with('success', 'El post se ha eliminado correctamente');
    }
}
