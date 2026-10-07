<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Proyecto;

use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;

        $tareas = Tarea::where('project_id','LIKE','%'.$busqueda.'%')
        ->orWhere('name','LIKE','%'.$busqueda.'%')
        ->orWhere('description','LIKE','%'.$busqueda.'%')
        ->orWhere('status','LIKE','%'.$busqueda.'%')
        ->orWhere('priority','LIKE','%'.$busqueda.'%')
        ->orWhere('due_date','LIKE','%'.$busqueda.'%')

        ->paginate(10);

        return view('tarea.index', compact('tareas','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tareas = Tarea::all();
        $proyectos = Proyecto::all();
        return view('tarea.create', compact('tareas','proyectos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required',
            'name' => 'required|unique:tareas',
            'description' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'due_date' => 'required'
        ]);

        Tarea::create($request->all());
        return redirect()->route('tarea.index')->with('success','Registro Agregado');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        $proyectos = Proyecto::all();
        return view('tarea.edit', compact('tarea','proyectos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        $data = $request->validate([
            'project_id' => 'required',
            'name' => 'required|unique:tareas',
            'description' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'due_date' => 'required'
        ]);

        $tarea->update($data);
        return redirect()->route('tarea.index')->with('update','Registro Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tarea.index')->with('destroy','Registro Elimado');
    }
}
