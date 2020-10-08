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
                <h1 class="display-4 card-title">Iniciar Sesion</h1>
                <hr>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Recuerdame') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                            {{session()->forget('administrator')}}
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ url('loginX') }}">
                                    Eres Administrador?
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
</div>
    
@endsection
