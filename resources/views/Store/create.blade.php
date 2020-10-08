@extends('layouts.app')
@section('title','Crear Tienda')
@section('content')

<h1 class="display-4">Crear Tienda</h1>
<hr>

<div class="row">
  <div class="col-md-8">
    <div class="card text-center">
      <div class="card-header">
        Agregar Tienda
      </div>
      <div class="card-body">
      <form action="{{url('agregarTienda')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Nombre Tienda</label>
              <input type="text" class="form-control" name="storeName">
            </div>
                <div class="form-group col-md-3">
              <label for="inputEmail4">Telefono Tienda</label>
              <input type="text" class="form-control" name="storePhone">
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Correo Tienda</label>
                <input type="text" class="form-control" name="storeEmail">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Direccion de la tienda</label>
            <textarea class="form-control" name="storeAddress" rows="2"></textarea>
          </div>
          <br>
          <div class="form-group">
            <label for="exampleInputEmail1">Ciudad</label>
            <select class="form-control" name="city_id">
              @foreach($city as $cat)
            <option value="{{  $cat->id  }}">{{   $cat->city_name }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary btn-lg">Crear</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4">
  <img src="{{asset('storage/store.jpg')}}" width="500" height="425"/>
  </div>
</div>
@endsection