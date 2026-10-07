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
                        <h4>
                            Editar un proyecto
                            <a href="{{url('proyecto')}}" class="btn btn-danger float-end">Regresar</a>
                        </h4>
                    </div>


                    <div class="card-body">
                        <form action="{{route('proyecto.update',['proyecto'=>$proyecto])}}" method="post">
                           @csrf 
                           @method('put')

                           <div class="form-group">
                                <label for="client_id">client_id</label>
                                <select class="form-control" name="client_id">
                                    <option value="">Selecciona un Procesador</option>
                                    @foreach($clientes as $cliente)
                                    @if($cliente->id == $proyecto->client_id)
                                    <option selected value="{{ $proyecto->id  }}">{{
                                        $cliente->name }}</option>
                                    @else
                                    <option value="{{ $cliente->id  }}">{{ $cliente->name
                                        }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('client_id')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                           <div class="mb-3">
                                <label>name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name',$proyecto->name) }}">
                                @error('name')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>email</label>
                                <input type="text" class="form-control" name="description" value="{{ old('description',$proyecto->description) }}">
                                @error('description')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>status</label>
                                <input class="form-control" type="text" name="status" value="{{ old('status',$proyecto->status) }}">
                                @error('status')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>start_date</label>
                                <input class="form-control" type="date" name="start_date" value="{{ old('start_date',$proyecto->start_date) }}">
                                @error('start_date')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>end_date</label>
                                <input class="form-control" type="date" name="end_date" value="{{ old('end_date',$proyecto->end_date) }}">
                                @error('end_date')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <button class="btn btn-primary" type="submit">Actualizar</button>
                            
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection

</body>
</html>