@extends('layouts.app')
@section('title','Carrito')
@section('content')
<h1>Clientes</h1>
<hr>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Codigo</th>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $lel)
        <tr>
            <td>{{$lel->id}}</td>
            <td>{{$lel->name}}</td>
            <td>{{$lel->email}}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection