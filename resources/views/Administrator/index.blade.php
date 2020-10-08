@extends('layouts.app')
@section('title','Usuarios Administradores')
@section('content')

<h1>Administradores</h1>
<hr>
<div class="row">
    @foreach($users as $lel)
        <div class="card  text-white bg-dark mr-3" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$lel->name}}</h5>
              <p class="card-text">{{$lel->email}}</p>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item text-white bg-dark">ID: <span class="badge badge-pill badge-primary">{{$lel->id}}</span></li>
              <li class="list-group-item text-white bg-dark">Rol: {{$lel->rol}}</li>
              <li class="list-group-item text-white bg-dark">Fecha Asignacion: {{$lel->date}}</li>
            </ul>
            <div class="card-body">
            </div>
          </div>
    @endforeach
    </div>

@endsection