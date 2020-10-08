@extends('layouts.app')
@section('title','Productos')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Todos los productos</li>
    </ol>
  </nav>
  <br>
<div class="row">
    @foreach($product as $prod)
        <div class="card mb-3 mr-3" style="max-width: 350px;">
        <div class="row no-gutters">
        <div class="col-md-4">
            <img src="{{asset('storage/'.$prod->product_img )}}"  class="card-img" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title">{{   $prod->product_name }}</h5>
            <p class="card-text">{{ $prod->product_description  }}</p>
            <p class="card-text"><small class="text-muted">{{   $prod->product_price    }}</small></p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#s{{$prod->id}}">Ver mas</button>
            <button class="btn btn-info">agregar</button>
            </div>
        </div>
        </div>
    </div>
  <div class="modal fade bd-example-modal-lg" tabindex="-1" id="s{{$prod->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            <img src="{{asset('storage/'.$prod->product_img )}}" class="card-img-top" width="400" height="400" alt="...">
            <center>
              <div class="card w-75 border-warning">
                <h1 class="display-4">{{   $prod->product_name }}</h1>
                <ul>
                  <li>Phasellus iaculis neque</li>
                  <li>Purus sodales ultricies</li>
                  <li>Vestibulum laoreet porttitor sem</li>
                  <li>Ac tristique libero volutpat at</li>
                </ul>
                <div class="row">
                  <div class="col-4">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                  </div>
                  <div class="col-7 mb-2 mr-2">
                    <form action="{{ route('add')}}" method="post">
                      @csrf
                      <div class="input-group">
                        <input type="number" class="form-control" name="cant">
                      <div class="input-group-append">
                      <input name="id" value="{{$prod->id}}" hidden>
                      <input name="nomb" value="{{$prod->product_name}}" hidden>
                      <input name="desc" value="{{$prod->product_description}}" hidden>
                      <input name="img" value="{{$prod->product_img}}" hidden>
                      <input name="price" value="{{$prod->product_price}}" hidden>
                        <input value="Agregar" class="btn btn-outline-success"  type="submit">
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </center>
            <br>
          </div>
        </div>
      </div>
@endforeach
@endsection