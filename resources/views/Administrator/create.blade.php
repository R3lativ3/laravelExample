@extends('layouts.app')
@section('title','Detalle de Compra')
@section('content')

<h1 class="display-4">Usuario Administrador</h1>
<hr>

<div class="row">
  <div class="col-md-8">
    <div class="card text-center">
      <div class="card-header">
        Crear Nuevo
      </div>
      <div class="card-body">
      <form action="{{ url('almacenarAdmin')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Nombre de Usuario</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="mail">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Contrasena</label>
            <input type="password" class="form-control" name="psw">
          </div>
          <br>
          <button type="submit" class="btn btn-primary btn-lg">Crear</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4">
  <img src="{{asset('storage/banner.jpg')}}" width="500" height="425"/>
  </div>
</div>
@endsection