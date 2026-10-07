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

                        <h4>Agregar una Tarea
                            <a class="btn btn-danger float-end" href="{{url('tarea')}}">Regresar</a>
                        </h4>
                        <form action="{{route('tarea.store')}}" method="post">
                            @csrf
                            @method('post')

                            <div class="form-group">
                                <label for="client_id">Proyectos</label>
                                <select class="form-control" name="project_id">
                                    <option value="">Selecciona un proyecto</option>
                                    @foreach($proyectos as $proyecto)
                                    @if($proyecto->id == $tarea->project_id)
                                    <option selected value="{{ $proyecto->id  }}">{{
                                        $proyecto->name }}</option>
                                    @else
                                    <option value="{{ $proyecto->id }}">{{ $proyecto->name
                                        }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('project_id')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>name</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name',$tarea->name) }}">
                                @error('name')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>description</label>
                                <input class="form-control" type="text" name="description" value="{{ old('description',$tarea->description) }}">
                                @error('description')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>status</label>
                                <input class="form-control" type="text" name="status" value="{{ old('status',$tarea->status) }}">
                                @error('status')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>priority</label>
                                <input class="form-control" type="text" name="priority" value="{{ old('priority',$tarea->priority) }}">
                                @error('priority')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>due_date</label>
                                <input class="form-control" type="date" name="due_date" value="{{ old('due_date',$tarea->due_date) }}">
                                @error('due_date')
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