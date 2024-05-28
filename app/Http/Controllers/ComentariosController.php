<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use App\Models\User;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'comentario' => 'required',  
            'user1' => 'required',    
            'id_post' => 'required'      
        ]);
    
        $comentarios = new Comentarios();  
    
        
        $comentarios->comentario = $request->comentario;  
        $comentarios->id_user1 = $request->user1;          
        $comentarios->id_post = $request->id_post;        
    
        if($comentarios->save()){
            return redirect()->back()->with('success', 'El comentario se ha guardado correctamente');
        }
        else {
            return redirect()->back()->with('error', 'Hubo un error');  
        }
    
    }
}
