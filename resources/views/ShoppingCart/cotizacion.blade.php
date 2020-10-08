<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/sb-admin-2.min.css') }}">
</head>
<body>
<div class="container-fluid ">
  @php
  $sum = 0; $su =0
  @endphp
        <nav class="navbar navbar-expand-lg navbar-light bg-info" style="height:90px; background: #56CCF2;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #2F80ED, #56CCF2);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #2F80ED, #56CCF2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
        <a class="navbar-brand" href="#">
            <div class="badge badge-primary text-wrap" style="width: 6rem;">
                <h3><strong>EconoGuate</strong></h3>
              </div>
        </a>
        </nav>
    <div class="card-body">
        <div class="mx-auto">
            <h4 class="display-4 text-center">Cotizacion No.
              @if(session()->has('idCotizacion'))
              @foreach(session()->get('idCotizacion') as $lelx)
            <strong>
              @if($su < 1)

              {{$lelx }}
              @php
              $su++
              @endphp
              @endif
            </strong>
            @endforeach
            @endif -
            {{ date('d/m/Y') }}
          </h4>
        </div>
        <br>
        <br><br><br><br>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @if(session()->has('cartX'))
              @foreach(session()->get('cartX') as $lel)
              <tr>
                <td>{{$lel['desc']}}</td>
                <td>{{$lel['cant']}}</td>
                <td>{{$lel['price']}}</td>
                <td>{{floatval($lel['cant'])*floatval($lel['price'])}}</td>
              </tr>
              @php
                $sum += floatval($lel['cant'])*floatval($lel['price'])
              @endphp
              @endforeach
              @endif
              <TR class="bg-success">
                  <td>Subtotal</td>
                  <td></td>
                  <td></td>
                  <td>{{$sum}}</td>
              </TR>
            </tbody>
          </table>
        <footer class="blockquote-footer"><p>Los productos incluyen IVA</p>
        <p>Puedes realizar la compra en nuestra pagina usando el numero de cotizacion.</p>
        </footer>
    </div>
</div>


    <script src="{{ URL::asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('js/sb-admin-2.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{ URL::asset('vendor/chart.js/Chart.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ URL::asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ URL::asset('js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap-input-spinner.js')}}"></script>
</body>
</html>