@extends('layouts.app')
@section('title','producto nuevo')
@section('content')


<h1 class="display-4">Crear Producto</h1>
<hr>

<div class="row">
  <div class="col-md-8">
    <div class="card text-center">
      <div class="card-header">
        Agregar Producto
      </div>
      <div class="card-body">
      <form action="{{ route('guardar')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Nombre Producto</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Precio</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Q</span>
                </div>
                <input type="number" class="form-control" name="price">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripcion del Producto</label>
            <textarea class="form-control" name="desc" rows="2"></textarea>
          </div>
          <label for="inputPassword4">Imagen</label>
          <input type='file' name="image" onchange="readURL(this);" />
          <img id="blah" src="{{asset('storage/im2.png')}}" alt="your image" style="max-width:280px;" />
          <br>
          <div class="form-group">
            <label for="exampleInputEmail1">Categoria</label>
            <select class="form-control" name="category_id">
              @foreach($categories as $cat)
            <option value="{{  $cat->id  }}">{{   $cat->category_name   }}</option>
              @endforeach
            </select>
            
          </div>
          <button type="submit" class="btn btn-primary btn-lg">Crear</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4">
  <img src="{{asset('storage/banner.jpg')}}" width="500" height="425"/>
  </div>
</div>


@endsection

<script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>