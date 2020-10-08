@extends('layouts.app')
@section('title','Detalle de Compra')
@section('content')
  @php
  $sum = 0
  @endphp
  <a class="btn btn-info" style="color:white;" href="{{url('pdfCompra')}}">Obtener PDF</a>
  <h1 class="display-4">Detalle de Compra</h1>
<hr>
          <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-info" style="height:90px; background: #56CCF2;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #2F80ED, #56CCF2);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #2F80ED, #56CCF2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
        <a class="navbar-brand" href="#">
            <div class="badge badge-primary text-wrap" style="width: 11rem;">
                <h3><strong>EconoGuate</strong></h3>
              </div>
        </a>
        </nav>
        <br>
        <ul class="list-group list-group-horizontal-lg  justify-content-center">
            @foreach(session()->get('order') as $lel)
            <li class="list-group-item"><strong>Nombre: </strong>{{$lel['name']}}</li>
            <li class="list-group-item"><strong>Direccion: </strong>{{$lel['address']}}</li>
            <li class="list-group-item"><strong>Email: </strong>{{$lel['email']}}</li>
            <li class="list-group-item"><strong>Fecha: </strong>{{$lel['date']}}</li>
            @endforeach
        </ul>
<br><hr>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($details as $det)
                    <tr>
                        <th scope="row">{{$det->id}}</th>
                        <td>{{$det->product_name}}</td>
                        <td>{{$det->quantity}}</td>
                        <td>{{$det->product_price}}</td>
                        <td>{{floatval($det->quantity)*floatval($det->product_price)}}</td>
                    </tr>
                    @php
                    $sum += floatval($det->quantity)*floatval($det->product_price)
                    @endphp
                    @endforeach
                    @foreach($recarga as $rec)
                    <tr>
                        <td>8929</td>
                        <td>Recarga {{$rec->company}} Numero tel: {{$rec->number}}</td>
                        <td>1</td>
                        <td>{{$rec->amount}}</td>
                        <td>{{$rec->amount}}</td>
                        @php
                        $sum += $rec->amount;
                        @endphp
                    </tr>
                    @endforeach
                    <tr class="table-info">
                        <td>TOTAL</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$sum}}</td>
                    </tr>
                </tbody>
              </table>
        </div>
@endsection