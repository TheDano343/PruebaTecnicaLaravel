<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Cliente;

use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;

        $proyectos = Proyecto::where('name','LIKE','%'.$busqueda.'%')
        ->orWhere('client_id','LIKE','%'.$busqueda.'%')
        ->orWhere('name','LIKE','%'.$busqueda.'%')
        ->orWhere('description','LIKE','%'.$busqueda.'%')
        ->orWhere('status','LIKE','%'.$busqueda.'%')
        ->orWhere('start_date','LIKE','%'.$busqueda.'%')
        ->orWhere('end_date','LIKE','%'.$busqueda.'%')

        ->paginate(10);

        return view('proyecto.index', compact('proyectos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyectos = Proyecto::all();
        $clientes = Cliente::all();
        return view('proyecto.create', compact('proyectos','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'name' => 'required|unique:proyectos',
            'description' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Proyecto::create($request->all());
        return redirect()->route('proyecto.index')->with('success','Registro Agregado');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        $clientes = Cliente::all();
        return view('proyecto.edit',compact('proyecto','clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $data = $request->validate([
            'client_id' => 'required',
            'name' => 'required|unique:proyectos',
            'description' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);


        $proyecto->update($data);
        return redirect()->route('proyecto.index')->with('update','Registro Actualizado');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect()->route('proyecto.index')->with('destroy','Registro Elimado');
    }
}
