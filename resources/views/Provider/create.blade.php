@extends('layouts.app')
@section('title','Carrito')
@section('content')
<h1 class="display-4">Agregar Proveedor</h1>
<hr>

<div class="row">
  <div class="col-md-8">
    <div class="card text-center">
      <div class="card-header">
        Agregar Proveedor
      </div>
      <div class="card-body">
      <form action="{{url('agregarProveedor')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-row">
            <div class="form-group col-12">
              <label for="inputEmail4">Nombre de Proveedor</label>
              <input type="text" class="form-control" name="provider">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-12">
              <label for="inputEmail4">Observaciones</label>
              <input type="text" class="form-control" name="observations">
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary btn-lg">Agregar</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4">
  <img src="{{asset('storage/proveedor.jpg')}}" width="500" height="425"/>
  </div>
</div>

@endsection