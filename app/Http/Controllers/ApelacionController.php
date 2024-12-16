<?php

namespace App\Http\Controllers;

use App\Models\Apelacion;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApelacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $apelacion = Apelacion::all();
        return view('admin.quejas', compact('apelacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $reporte = Report::all();
        $apelacion = Apelacion::where('id',$id)->first();

        return view('admin.respuesta', compact('apelacion','reporte'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $apelacion = Apelacion::create([
            'apelamiento' => $request->description,
            'status' => 'Pendiente',
            'id_user' => Auth::user()->id,
        ]);

        $apelacion->save();

        return redirect()->back()->with('success', 'Apelación enviada correctamente, evaluaremos tu mensaje.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Apelacion $apelacion, Request $request)
    {
        $request->validate([
            'respuesta' => 'required'
        ]);

        $apelacion = Apelacion::findOrFail($request->id_apelacion);
        $apelacion->respuesta = $request->respuesta;

        $apelacion->save(); 
    
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Apelacion $apelacion)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $apelacion = Apelacion::findOrFail($request->id_apelacion);
        $apelacion->status = $request->status;

        $apelacion->save(); 
    
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apelacion $apelacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apelacion $apelacion)
    {
        //
    }
}
