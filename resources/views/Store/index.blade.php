@extends('layouts.app')
@section('title','Tiendas')
@section('content')


    @if($stores == null)
        <div>
            <h1>ERROR, NINGUNA TIENDA ENCONTRADA</h1>
        </div>
    @else
        <div class="row">
        @foreach($stores as $lel)
            <div class="card  text-white bg-dark mr-3" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{$lel->store_name}}</h5>
                  <p class="card-text">{{$lel->store_address}}</p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item text-white bg-dark">Telefono: {{$lel->store_phone}}</li>
                  <li class="list-group-item text-white bg-dark">Correo: {{$lel->store_email}}</li>
                  <li class="list-group-item text-white bg-dark">Productos en tienda: <span class="badge badge-pill badge-primary">{{$lel->d}}</span></li>
                <li class="list-group-item text-white bg-dark">Cantidad de productos: <span class="badge badge-pill badge-success">{{$lel->c}}</span></li>
                </ul>
                <div class="card-body">
                    <div class="row">
                    <a type="button" class="btn btn-block btn-primary" href="{{url('agregarTiendaa/'.$lel->id)}}">Ver existencias</a>
                        <button type="button" class="btn btn-block btn-primary">Agregar Existencias</button>
                    </div>
                </div>
              </div>
        @endforeach
        </div>
    @endif

@endsection