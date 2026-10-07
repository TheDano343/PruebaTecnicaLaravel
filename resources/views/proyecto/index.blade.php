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
                        Proyecto
                        <a class="btn btn-primary float-end" href="{{url('proyecto/create')}}">Agregar un Proyecto
                            </a>
                    </h4>
                </div>


                <div class="row">

                    <div class="col-xs-6">
                        <form action="{{route('proyecto.index')}}" method="GET">
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
                                <th>client_id</th>
                                <th>name</th>
                                <th>description</th>
                                <th>status</th>
                                <th>start_date</th>
                                <th>end_date</th>

                                <th>Acciones</th>
                            </tr>
                        </thead>
                        @foreach($proyectos as $proyecto)
                        <tr>
                            <td>{{$proyecto->id}}</td>
                            <td>{{$proyecto->Cliente->name}}</td>
                            <td>{{$proyecto->name}}</td>
                            <td>{{$proyecto->description}}</td>
                            <td>{{$proyecto->status}}</td>
                            <td>{{$proyecto->start_date}}</td>
                            <td>{{$proyecto->end_date}}</td>

                            
                            <th><a class="btn btn-warning" href="{{route('proyecto.edit', ['proyecto'=>$proyecto])}}">Editar</a></th>
                            
                            <th>
                                <form action="{{route('proyecto.destroy', ['proyecto'=>$proyecto])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" type="submit" value="Eliminar" />
                                </form>
                            </th>
                            


                        </tr>
                        @endforeach
                    </table>
                    <div>
                        {{ $proyectos->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
</body>

</html>