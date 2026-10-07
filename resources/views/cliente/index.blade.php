@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/desaparecerFlash.js'])
</head>

<body>
    @section('content')

    <div id="mensaje-exito" class="container">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
    </div>

    <div id="mensaje-editado" class="container">
        @if(session()->has('update'))
        <div class="alert alert-primary">
            {{session('update')}}
        </div>
        @endif
    </div>

    <div id="mensaje-eliminado" class="container">
        @if(session()->has('destroy'))
        <div class="alert alert-danger">
            {{session('destroy')}}
        </div>
        @endif
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h4>
                        Clientes
                        <a class="btn btn-primary float-end" href="{{url('cliente/create')}}">Agregar un 
                            Cliente</a>
                    </h4>
                </div>


                <div class="row">

                    <div class="col-xs-6">
                        <form action="{{route('cliente.index')}}" method="GET">
                            <div class="btn-group">
                                <input type="text" name="busqueda" class="form-control">
                                <input type="submit" value="buscar" class="btn btn-primary">
                                <input type="submit" value="limpiar" class="btn btn-warning">

                            </div>
                        </form>
                    </div>
                    <br>

                    <br>
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>status</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->name}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>{{$cliente->phone}}</td>
                            <td>{{$cliente->status}}</td>
                            
                            <th><a class="btn btn-warning" href="{{route('cliente.edit', ['cliente'=>$cliente])}}">Editar</a></th>
                            

                            
                            <th>
                                <form action="{{route('cliente.destroy', ['cliente'=>$cliente])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" type="submit" value="Eliminar" />
                                </form>
                            </th>
                            


                        </tr>
                        @endforeach
                    </table>
                    <div>
                        {{ $clientes->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
</body>

</html>