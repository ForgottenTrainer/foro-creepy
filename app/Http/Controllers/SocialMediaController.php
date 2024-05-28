<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SocialMediaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'instagram' => '',
            'youtube' => '',
            'discord' => '',
            'website' => '',
        ]);


        $newRecord = new SocialMedia; 
        $newRecord->instagram = $request->instagram;
        $newRecord->youtube = $request->youtube;
        $newRecord->discord = $request->discord;
        $newRecord->web = $request->website;
        $newRecord->id_profile = Auth::id();
        $newRecord->save();

        return redirect()->back()->with('success', 'Datos guardados correctamente.');
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'instagram' => '',
            'youtube' => '',
            'discord' => '',
            'website' => '',
        ]);

        
        $newRecord = SocialMedia::find($id); 
        if ($newRecord) {
            $newRecord->instagram = $request->instagram;
            $newRecord->youtube = $request->youtube;
            $newRecord->discord = $request->discord;
            $newRecord->web = $request->website;
            $newRecord->id_profile = Auth::id();
            $newRecord->save();

            return redirect()->back()->with('success', 'Datos actualizados correctamente.');
        } else {
            return redirect()->back()->with('error', 'Registro no encontrado.');
        }
    }
}
