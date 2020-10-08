@extends('layouts.app')
@section('title','Proveedores')
@section('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Codigo</th>
        <th scope="col">Proveedor</th>
        <th scope="col">Observaciones</th>
        <th scope="col">Compras a este proveedor</th>
      </tr>
    </thead>
    <tbody>
        @foreach($providers as $lel)
        <tr>
            <td>{{$lel->id}}</td>
            <td>{{$lel->provider_name}}</td>
            <td>{{$lel->observations}}</td>
            <td><a class="badge btn btn-primary" href="#" role="button">Link</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection