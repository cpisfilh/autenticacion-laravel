@extends('layouts.plantilla')

@section('title','DASHBOARD')

@section('content')


<div class="container-md">
    @auth
    <a href="{{route('dashboard')}}">Dashboard</a>
    @endauth
        
    <div class="row">
    <h1>Login</h1>
        <div class="col-md-5">
            <form method="POST" action="{{route('login.post')}}">
                @csrf
            <div class = "form-group">
            <label>Usuario</label>
            <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Ingrese usuario">
            @error('email')
                <small class="text-danger">   *{{$message}}</small>
                <br>
            @enderror
            </div>
            <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
            @error('password')
                <small class="text-danger">*{{$message}}</small>
                <br>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Ingresar</button>
            </form>
        </div>
    </div>
</div>
@endsection