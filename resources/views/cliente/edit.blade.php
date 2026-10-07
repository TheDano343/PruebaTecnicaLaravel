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
                            Editar Cliente
                            <a href="{{url('cliente')}}" class="btn btn-danger float-end">Regresar</a>
                        </h4>
                    </div>


                    <div class="card-body">
                        <form action="{{route('cliente.update',['cliente'=>$cliente])}}" method="post">
                           @csrf 
                           @method('put')

                           <div class="mb-3">
                                <label>name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name',$cliente->name) }}">
                                @error('name')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>email</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email',$cliente->email) }}">
                                @error('email')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone',$cliente->phone) }}">
                                @error('phone')
                                <span>{{ $message }}</span>
                                <br>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>status</label>
                                <input type="text" class="form-control" name="status" value="{{ old('status',$cliente->status) }}">
                                @error('status')
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