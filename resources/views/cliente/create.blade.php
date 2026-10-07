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

                        <h4>Agregar un Cliente
                            <a class="btn btn-danger float-end" href="{{url('cliente')}}">Regresar</a>
                        </h4>
                        <form action="{{route('cliente.store')}}" method="post">
                            @csrf
                            @method('post')

                            <div class="form-group">
                                <label>name</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                @error('name')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>email</label>
                                <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>phone</label>
                                <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                                @error('phone')
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