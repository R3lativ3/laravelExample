@extends('layouts.app')
@section('title','Agregar Existencias')
@section('content')
    
<h1 class="display-4">Agregar Stock</h1>
<hr>

<div class="row">
  <div class="col-md-8">
    <div class="card text-center">
      <div class="card-header">
        Agregar Producto
      </div>
      <div class="card-body">
      <form action="{{ url('almacenarStock')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Tienda</label>
            <select class="form-control" name="store_id">
              @foreach($store as $cat)
            <option value="{{  $cat->id  }}">{{   $cat->store_name   }}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Producto</label>
            <select class="form-control" name="product_id">
              @foreach($products as $prod)
            <option value="{{  $prod->id  }}">{{   $prod->product_name   }}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="inputEmail4">Numero de certificacion</label>
            <input type="text" class="form-control" name="certificacion">
        </div>
        <div class="form-group">
            <label for="inputPassword4">Cantidad</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">C</span>
                </div>
                <input type="number" class="form-control" name="quantity">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Agregar</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4">
  <img src="{{asset('storage/banner.jpg')}}" width="500" height="425"/>
  </div>
</div>

@endsection
