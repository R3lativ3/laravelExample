@extends('layouts.app')
@section('title','Tiendas')
@section('content')
    @if($products == "empty")
        <p>nada</p>
    @else
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagen</th>
            <th scope="col">Cantidad</th>
          </tr>
        </thead>
        <tbody>
            @foreach($products as $lel)
            <tr>
                <td>{{$lel->product_name}}</td>
                <td>{{$lel->product_price}}</td>
                <td>{{$lel->category_name}}</td>
                <td><img src="{{asset('storage/'.$lel->product_img)}}" width="35px" height="35px" alt="..."></td>
                <td>{{$lel->quantity}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    @endif
@endsection