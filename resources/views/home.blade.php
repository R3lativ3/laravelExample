@extends('layouts.app')

@section('content')
<div id="container">
  <div class="row">
    <div class="col-8">
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <div class="row">
            <div class="col-6">
              <h1 class="display-3"><a href="#">Envios a tu casa</a></h1>
              <p class="lead">Llena la lista con los productos que desees, nosotros te lo llevamos a tu casa.</p>
            </div>
            <div class="col-6">
              <img class="card-img" src="storage/casa.png" alt="Card image">
            </div>
          </div>
        </div>
      </div>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <div class="row">
            <div class="col-6">
              <h1 class="display-3"><a href="#">Cotiza Precios</a></h1>
              <p class="lead">Puedes cotizar los productos y añadirlos a un listado, dicho listado te lo enviamos por correo electronico.</p>
            </div>
            <div class="col-6">
              <img class="card-img" src="storage/cotizacion.png" alt="Card image">
            </div>
          </div>
        </div>
      </div>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <div class="row">
            <div class="col-6">
              <h1 class="display-3"><a href="#">Display 1</a></h1>
              <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            </div>
            <div class="col-6">
              <img class="card-img" src="storage/medicina.png" alt="Card image">
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <div class="col-4">
      <div class="alert alert-warning" role="alert">
        <h1 class="display-4">Ofertas Actuales</h1>
      </div>

      <hr>
      <div class="card text-white bg-warning mb-3" >
        <div class="card-body">
          <h5 class="card-title">Coca cola </h5>
          <p class="card-text">Coca cola dos litros a Q.13.00</p>
        </div>
      </div>
      <div class="card text-white bg-warning mb-3" >
        <div class="card-body">
          <h5 class="card-title">Jabon ambar</h5>
          <p class="card-text">6 Unidades a Q.10.00</p>
        </div>
      </div>
      <div class="card text-white bg-warning mb-3" >
        <div class="card-body">
          <h5 class="card-title">Lays de Queso</h5>
          <p class="card-text">A solo Q.5.00</p>
        </div>
      </div>
      <div class="card text-white bg-warning mb-3" >
        <div class="card-body">
          <h5 class="card-title">Red Bull</h5>
          <p class="card-text">A solo Q.15.00</p>
        </div>
      </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
@endsection
