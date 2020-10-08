@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3 col-12" >
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="storage/logo2.png" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
                <h1 class="display-4 card-title">Iniciar Sesion Como Administrador</h1>
                <hr>
                <form method="POST" action="{{ url('verificarDatos') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                        <div class="col-md-6">
                            <input  class="form-control " name="email"  autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="psw" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
</div>
    
@endsection
