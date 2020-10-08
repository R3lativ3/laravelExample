@extends('layouts.app')
@section('title','Carrito')
@section('content')
@php
$sum = 0;
@endphp
<h1 class="display-4">Tu Carrito</h1>
<hr>
<div class="">
  @if(session()->has('cartX'))
    <div class="row">
        <div class="col-8">

          <table class="table table-borderless " id="preview">
            <thead class="table-dark">
              <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio Unitario</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>
              </tr>
            </thead>
            <tbody>

              @foreach(session()->get('cartX') as $lel)
              <tr>
                <th scope="row"><img src="{{asset('storage/'.$lel['img'])}}" width="75px" height="75px" alt="..."></th>
                <td>{{$lel['nomb']}}</td>
                <td id="price{{$lel['id']}}">{{$lel['price']}}</td>
                <td>{{$lel['cant']}}</td>
              <td class="sum_item" id="subtotal{{$lel['id']}}">Q. {{floatval($lel['cant'])*floatval($lel['price'])}}</td>
              </tr>
              @php
                $sum += floatval($lel['cant'])*floatval($lel['price'])
              @endphp
              @endforeach
              <tr class="bg-success">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              <td id="totalxxx" >Q. {{$sum}}</td>
              </tr>
            </tbody>
          </table>

        </div>
        <div class="col-4">
              <div class="card border-primary" id="cont">
                <div class="card-body">
                  <b><h3>Total de la compra</h3></b>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                        TOTAL DE PRODUCTOS <span>Q. {{$sum}}</span>
                        </li>
                        @if($sum > 100)
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                          Envio Gratuito <span>Q. 0.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                          <div>
                            <strong>Cobro Total</strong>
                            <strong>
                              <p class="mb-0">(incluye IVA)</p>
                            </strong>
                          </div>
                          <span><strong>Q. {{$sum}}</strong></span>
                        </li>
                        @else
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                          COSTO DEL ENVIO <span>Q. 30.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                          <div>
                            <strong>Cobro Total</strong>
                            <strong>
                              <p class="mb-0">(incluye IVA)</p>
                            </strong>
                          </div>
                          <span><strong>Q. {{$sum+30}}</strong></span>
                        </li>
                        @endif

                    </ul>
                  @auth

                  <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Finalizar</button>

                  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Ingrese sus datos</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{url('agregarVenta')}}"  method="POST">
                            @csrf
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Nombre</label>
                                  <input type="text" class="form-control" name="nombre">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Email</label>
                                  <input type="email" class="form-control" name="email">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputAddress2">Direccion</label>
                                <input type="text" class="form-control" name="address" placeholder="Apartment, studio, or floor">
                              </div>
                              <label for="inputAddress2">Deseas una recarga?</label>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                      No gracias
                                    </label>
                                  </div>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" id="clarobtn" class="btn" style="background-color: red; color:white;">Claro</button>
                                    <button type="button" id="tigobtn" class="btn" style="background-color: blue; color:white;">Tigo</button>
                                    <button type="button" id="tuentibtn" class="btn" style="background-color:deeppink; color:white;">Tuenti</button>
                                  </div>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Numero Telefonico</label>
                                  <input type="number" id="tell" class="form-control" name="number">
                                </div>
                              </div>
                              <input type="number" class="form-control" id="empresa" name="company" hidden>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="inputState">SALDO</label>
                                  <select name="amount" id="selectt" class="form-control">
                                    <option value="10">Q10.00</option>
                                    <option value="20">Q20.00</option>
                                    <option value="50">Q50.00</option>
                                    <option value="100">Q100.00</option>
                                    <option value="200">Q200.00</option>
                                  </select>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-block btn-primary">Facturar</button>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  @endauth
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info  btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
                      Enviar Cotizacion por correo electronico
                    </button>
                    <br>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingrese sus datos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{url('enviarCotizacionEmail')}}"  method="POST">
                              @csrf
                              <div class="form-group">
                                <label for="exampleInputEmail1">Correo Electronico</label>
                                <input type="email" class="form-control" name="correo" aria-describedby="emailHelp">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Nombre</label>
                                <input type="text" class="form-control" name="nombre">
                              </div>
                              <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <a type="button" class="btn btn-danger btn-lg btn-block" href="{{url('clear')}}">Cancelar Compra</a>
                </div>
              </div>
        </div>
    </div>
    <div id="result">

    </div>

    @else
    <div class="container">
      <img src="{{asset('storage/carritoVacio.png')}}">
    </div>
</div>
@endif
@endsection
<script>


/*
  function multiplicar(d){
    var price = '#price'+d.toString();
    var cant = '#cant'+d.toString();
    var subt = '#subtotal'+d.toString();
    var n1 = parseFloat($(price).text());
    var n2 = parseFloat($(cant).val());
    $( "#subtotal"+d ).html(n1*n2);
    hola()
  }

  function llenarLista(){
    var array = [];
    var rows  = $("#preview tbody tr");

    $.each( rows, function(index, row) {   
        var columns = $(row).find("td");
        
        array[index] = {};             
        array[index].from = columns[0].innerHTML;    
        array[index].type = columns[1].innerHTML;
        array[index].amount = columns[2].val;
        
        if(index > 0){
            array[index - 1].to = columns[0].innerHTML;
        }      
    });
        
    $("#result").text(JSON.stringify(array));
  }

  function hola(){
    var sum=0;
    $('.sum_item').each(function(){
    var item_val=parseFloat($(this).text());
    if(isNaN(item_val)){
      item_val=0;
    }
    sum+=item_val;
//    alert(parseFloat(sum))
    $('#totalxxx').html(sum.toFixed(2));
    });
  }
*/

</script>