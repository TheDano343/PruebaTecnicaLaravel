<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $clientes = Cliente::where('name','LIKE','%'.$busqueda.'%')
        ->orWhere('email','LIKE','%'.$busqueda.'%')
        ->orWhere('phone','LIKE','%'.$busqueda.'%')
        ->orWhere('status','LIKE','%'.$busqueda.'%')

        ->paginate(10);

        return view('cliente.index', compact('clientes','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:clientes',
            'email' => 'required',
            'phone' => 'required',
            'status' => 'required'
        ]);

        Cliente::create($request->all());
        return redirect()->route('cliente.index')->with('success','Registro Agregado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $data = $request->validate([
            'name' => 'required|unique:clientes',
            'email' => 'required',
            'phone' => 'required',
            'status' => 'required'
        ]);

        $cliente->update($data);
        return redirect()->route('cliente.index')->with('update','Registro Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.index')->with('destroy','Registro Elimado');
    }
}
