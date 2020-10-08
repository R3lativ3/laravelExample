<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ Session::token() }}">

  <title>EconoGuate : : @yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="shortcut icon" type="image/jpg" href="{{asset('storage/favicon.ico')}}"/>
  <link rel="stylesheet" href="{{ URL::asset('css/sb-admin-2.min.css') }}">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon">
      <img src="{{asset('storage/logo2.png')}}" width="200" height="200">
        </div>
      </a>
      
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Interface
      </div>

      @if(session()->has('administrador'))
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fab fa-product-hunt"></i>
          <span>Productos</span>
        </a>
        <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Funciones:</h6>
            <a class="collapse-item" href="{{url('createProduct')}}">Agregar Productos</a>
            <a class="collapse-item" href="{{url('productos')}}">Ver Productos</a>
            <a class="collapse-item" href="{{url('agregarStock')}}">Asignar Producto a Sucursal</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-store"></i>
          <span>Tiendas</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Funciones:</h6>
            <a class="collapse-item" href="{{url('tiendas')}}">Ver todas las tiendas</a>
            <a class="collapse-item" href="{{url('crearTienda')}}">Crear tienda</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities23" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fab fa-black-tie"></i>
          <span>Proveedores</span>
        </a>
        <div id="collapseUtilities23" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="{{url('proveedores')}}">Ver Proveedores</a>
            <a class="collapse-item" href="{{url('crearProveedor')}}">Agregar Proveedores</a>
            <a class="collapse-item" href="utilities-color.html">Ver Compras a Proveedores</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities24" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fab fa-black-tie"></i>
          <span>Clientes</span>
        </a>
        <div id="collapseUtilities24" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="{{url('usuarios')}}">Ver Clientes</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities25" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fab fa-black-tie"></i>
          <span>Administradores</span>
        </a>
        <div id="collapseUtilities25" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="{{url('verAdministradores')}}">Ver Administradores</a>
            <a class="collapse-item" href="{{url('crearUsuarioAdministrador')}}">Agregar Administrador</a></div>
        </div>
      </li>
      @endif
      
      <hr class="sidebar-divider">
      <div class="sidebar-heading bg-info">
        Productos
      </div>
      <li class="nav-item">
      <a class="nav-link bg-info" href="{{url('productsCategory/3')}}">
          <i class="fas fa-allergies"></i>
          <span>Limpieza</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link bg-info" href="{{url('productsCategory/1')}}">
          <i class="fas fa-glass-whiskey"></i>
          <span>Gaseosas</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link bg-info" href="{{url('productsCategory/2')}}">
          <i class="fas fa-bacon"></i>
          <span>Carnes</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link bg-info" href="{{url('productsCategory/5')}}">
        <i class="fas fa-candy-cane"></i>
          <span>Golosinas</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link bg-info" href="{{url('productsCategory/4')}}">
        <i class="fas fa-candy-cane"></i>
          <span>Pastas</span></a>
      </li>
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Informacion de contacto
      </div>
      <!-- Nav Item - Charts -->
      <li class="nav-item">
      <a class="nav-link" href="{{url('sucursales')}}">
          <i class="fas fa-map-marked-alt"></i>
          <span>Ubicaciones</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      @auth
      @endauth
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cart-plus"></i>
                <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">
                @if(session()->has('cartX'))
                {{count(session()->get('cartX'))}}
                @endif
              </span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Elementos anadidos
                </h6>
                @if(session()->has('cartX'))
                @foreach(session()->get('cartX') as $lel)
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <img src="{{asset('storage/'.$lel['img'])}}" width="40" height="40">
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    {{$lel['desc']}}
                  <span class="badge badge-pill badge-warning">Cantidad: {{$lel['cant']}}</span>
                  </div>
                </a>
                @endforeach
                @endif
              <a class="dropdown-item text-center  text-gray" href="{{url('carrito')}}">Terminar</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"> Iniciar Sesion <i class="fas fa-sign-in-alt"></i></a>
                    
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                    </li>
                @endif
            @else
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                  <img class="img-profile rounded-circle" src={{asset('storage/avatar.png')}}>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
            @endguest
          </ul>

        </nav>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>


  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Te vas a ir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecciona 'logout' si quieres cerrar sesion</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
{{ __('Logout') }}</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
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
  <script>
    

</script>
</body>

</html>
<script>
$( '#defaultCheck1' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
        $('#clarobtn').attr("disabled", true);
        $('#tigobtn').attr("disabled", true);
        $('#tuentibtn').attr("disabled", true);
        $('#empresa').val(0);
        $('#tell').val(0);        
        $('#selectt').val(0);
        $('#selectt').prop('disabled', true);
        $('#tell').prop('disabled', true);
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        $('#clarobtn').attr("disabled", false);
        $('#tigobtn').attr("disabled", false);
        $('#tuentibtn').attr("disabled", false);
        $('#selectt').prop('disabled', false);
        $('#tell').prop('disabled', false);
    }
});

$( "#clarobtn" ).click(function() {
  $('#tigobtn').attr("disabled", true);
  $('#tuentibtn').attr("disabled", true);
  $('#empresa').val(1);
});

$( "#tigobtn" ).click(function() {
  $('#clarobtn').attr("disabled", true);
  $('#tuentibtn').attr("disabled", true);
  $('#empresa').val(2);
});

$( "#tuentibtn" ).click(function() {
  $('#clarobtn').attr("disabled", true);
  $('#tigobtn').attr("disabled", true);
  $('#empresa').val(3);
});

</script>