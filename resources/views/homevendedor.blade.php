<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestion de clientes</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gpc.css') }}" rel="stylesheet">
    <link rel="stylesheet"href="{{public_path('css/sb-admin-2.min.css')}}">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('image/logo.svg') }}">
    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background: radial-gradient(#F7F7F7, #0A1626);">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow encabezado">
    <div>
        <img src="{{ asset('image/logo.svg') }}" alt="gpc" width="80" height="80" style="margin:10px">
    </div>

    <!-- Contenedor centrado para los botones -->
    <div class="container d-flex justify-content-center">
        <div class="d-flex justify-content-center align-items-center gap-4">
            <a class="nav-link botonGPC text-center" href="/Final_proyect/gpc/public/cliente" style="color: #000000">
                <img src="{{ asset('image/posible_cliente.png') }}" alt="posible_cliente" width="50" height="50">
                <p><span>Clientes</span></p>
            </a>

            <a class="nav-link botonGPC text-center" href="/Final_proyect/gpc/public/producto" style="color: #000000">
                <img src="{{ asset('image/productoservicio.png') }}" alt="producto_servicio" width="50" height="50">
                <p><span>Productos</span></p>
            </a>

            <a class="nav-link botonGPC text-center" href="/Final_proyect/gpc/public/guion" style="color: #000000">
                <img src="{{ asset('image/marketing.png') }}" alt="guion" width="50" height="50">
                <p><span>Guion de ventas</span></p>
            </a>

            <a class="nav-link botonGPC text-center" href="/Final_proyect/gpc/public/atencion" style="color: #000000">
                <img src="{{ asset('image/marketing.png') }}" alt="marketing" width="50" height="50">
                <p><span>Tus atenciones</span></p>
            </a>
        </div>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline small" style="color: #000000">{{ auth()->user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ auth()->user()->avatar }}">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar sesión
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid tablasGPC">

                    <!-- Page Heading -->
                     <h1 class="h3 mb-2">
                        @yield('titulo')
                     </h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                            
                            
                                <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            @hasSection('contenido')
                @yield('contenido')
            @else
            <div class="contenedor-vendedor">
    <div class="card-vendedor">
        <img src="{{ asset('image/1.jpeg') }}" alt="Clientes">
        <h3>Clientes</h3>
        <p>Gestiona clientes potenciales, crea, actualiza y elimina registros fácilmente.</p>
        
        <a href="/cliente" class="boton-home">Ir a Clientes</a>
    </div>

    <div class="card-vendedor">
        <img src="{{ asset('image/2.jpeg') }}" alt="Productos">
        <h3>Productos</h3>
        <p>Visualiza los productos disponibles y sugiere nuevos al administrador.</p>
        <a href="/producto" class="boton-home">Ir a Productos</a>
    </div>

    <div class="card-vendedor">
        <img src="{{ asset('image/3.jpeg') }}" alt="Guiones de Ventas">
        <h3>Guiones de Ventas</h3>
        <p>Consulta los guiones disponibles y sugiere actualizaciones al administrador.</p>
        <a href="/guion" class="boton-home">Ir a Guiones</a>
    </div>

    <div class="card-vendedor">
        <img src="{{ asset('image/4.jpeg') }}" alt="Atenciones">
        <h3>Atenciones</h3>
        <p>Crea y gestiona atenciones con clientes potenciales y asocia productos y guiones.</p>
        <a href="/atencion" class="boton-home">Ir a Atenciones</a>
    </div>
</div>
            @endif
        </div>
    </div>
</div>

                                

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; GPC 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Estas seguro de que quieres cerrar sesion?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout">Cerrar sesion</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script src="js/sb-admin-2.js"></script>
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    

</body>

</html>