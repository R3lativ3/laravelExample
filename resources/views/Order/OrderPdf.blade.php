<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    @php
  $sum = 0;$su =0; $id = session()->get('order')[0]['id'];
  @endphp
  <div class="justify-content-center">
    <div class="badge badge-light text-wrap" style="width: 18rem;">
    <h3><strong>Detalle De Compra </strong></h3>
    </div>
    <div class="badge badge-warning text-wrap" style="width: 3rem;">
        <h3><strong>{{$id}}</strong></h3>
        </div>
    <div class="badge badge-primary text-wrap" style="width: 10rem;">
        <h3><strong>EconoGuate</strong></h3>
    </div>
  </div>

            <div class="container">
            @foreach(session()->get('order') as $lel)
            @if($su < 1)
            <p><strong>Nombre: </strong>{{$lel['name']}}</p>
            <p><strong>Direccion: </strong>{{$lel['address']}}</p>
            <p><strong>Email: </strong>{{$lel['email']}}</p>
            <p><strong>Fecha: </strong>{{$lel['date']}}</p>
            @php
            $su++
            @endphp
            @endif
            @endforeach
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
</body>
</html>