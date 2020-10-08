@extends('layouts.app')
@section('title','Carrito')
@section('content')

<h1>Sucursales de Venta</h1>

<hr>

<div class="row">
    <div class="card mb-3 mr-3" style="max-width: 740px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="{{asset('storage/esc.jpg')}}" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Escuintla</h5>
              <p class="card-text">Colonia El recreo zona 3, calle principal 4 av. 6-9</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="card mb-3 mr-3" style="max-width: 740px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="{{asset('storage/guate.jpg')}}" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Guatemala</h5>
                <p class="card-text">Zona 21, colinas de villa hermosa. lote 23-2, calle 8</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="card mb-3 mr-3" style="max-width: 740px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="{{asset('storage/peten.jpg')}}" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Peten</h5>
                <p class="card-text">5ta calle lote 9 sector A jacarandas 1, zona 4</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
</div>

@endsection