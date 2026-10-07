@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h4>Agregar una Proyecto
                            <a class="btn btn-danger float-end" href="{{url('proyecto')}}">Regresar</a>
                        </h4>
                        <form action="{{route('proyecto.store')}}" method="post">
                            @csrf
                            @method('post')

                            <div class="form-group">
                                <label for="client_id">client_id</label>
                                <select class="form-control" name="client_id">
                                    <option value="">Selecciona un Cliente</option>
                                    @foreach($clientes as $cliente)
                    
                                     <option value="{{ $cliente->id }}" {{ old('client_id') == $cliente->id ? 'selected' : '' }}>{{ $cliente->name }}</option> 
                                    
                                    @endforeach
                                </select>
                                @error('client_id')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>name</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                @error('name')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>description</label>
                                <input class="form-control" type="text" name="description" value="{{ old('description') }}">
                                @error('description')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>status</label>
                                <input class="form-control" type="text" name="status" value="{{ old('status') }}">
                                @error('status')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>start_date</label>
                                <input class="form-control" type="date" name="start_date" value="{{ old('start_date') }}">
                                @error('start_date')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>end_date</label>
                                <input class="form-control" type="date" name="end_date" value="{{ old('end_date') }}">
                                @error('end_date')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <button class="btn btn-primary" type="submit">Crear</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>