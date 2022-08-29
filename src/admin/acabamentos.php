<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acabamentos | Ideias com Relevo</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    input[type=number] {
        -moz-appearance: textfield;
    }

    .carousel{
        display: block;
        width: 100%;
        height: 200px;
        overflow-x: scroll;
        padding: 10px;
        margin: 0;
        white-space: nowrap; 
        border-top: 2px solid rgba(0, 0, 0, 0.1);
        border-bottom: 2px solid rgba(0, 0, 0, 0.1);
    }

    .carousel-item {
        display: inline-block;
        height: 100%;
        max-width: 300px;
        margin: 0 10px;
        float: none;
        background-size: cover;
        position: relative;
    }

    .carousel-item img {
        height: 100%;
    }

    .carousel-item:nth-child(1) img {
        border-style: solid;
        border-color:white;

    }


</style>
<body class="hold-transition sidebar-mini dark-mode">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link w-100">
                <img src="./dist/img/Brand/SVG/Logo.svg" alt="AdminLTE Logo" class="col-2 m-0">
                <img src="./dist/img/Brand/SVG/Typo_Title_white.svg" class="col-10">
            </a>

            <!-- Sidebar -->
            <div class="sidebar pt-2">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="/admin/projetos">
                                <i class="nav-icon fas fa-project-diagram"></i>
                                Projetos
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-item nav-link" href="">
                                <i class="nav-icon fas fa-building"></i>
                                Tipologia <!- TODO: Mudar o nome disto ->
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-item nav-link active" href="/admin/acabamentos">
                                <i class="nav-icon fas fa-brush"></i>
                                Acabamentos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="/admin/contactos">
                                <i class="nav-icon fas fa-phone"></i>
                                Contactos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="/admin/associados">
                                <i class="nav-icon fas fa-user"></i>
                                Associados
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="pb-2">Acabamentos</h1>
                            <p class="mb-0">Todos os acabamentos adicionados no site.</p>
                            <p class="mb-1"></p>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Acabamentos</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- /.col-md-12 -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-0">Casas de Banho</h5>
                                </div>
                                <div class="card-body overflow-hidden w-100 d-block">
                                    <div class="carousel d-block">
                                        <div class="carousel-item">
                                            <a class="badge badge-danger position-absolute m-1 p-1"><i class="fa-solid fa-2x fa-trash-can"></i></a>
                                            <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="w-100 d-flex justify-content-end">
                                        <a href="#" class="btn btn-primary">Adicionar</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-0">Cozinhas e Salas</h5>
                                </div>
                                <div class="card-body overflow-hidden w-100 d-block">
                                    <div class="carousel d-block">
                                        <div class="carousel-item">
                                            <a class="badge badge-danger position-absolute m-1 p-1"><i class="fa-solid fa-2x fa-trash-can"></i></a>
                                            <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="w-100 d-flex justify-content-end">
                                        <a href="#" class="btn btn-primary">Adicionar</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-0">Arranjos e Soluções Exteriores</h5>
                                </div>
                                <div class="card-body overflow-hidden w-100 d-block">
                                    <div class="carousel d-block">
                                        <div class="carousel-item">
                                            <a class="badge badge-danger position-absolute m-1 p-1"><i class="fa-solid fa-2x fa-trash-can"></i></a>
                                            <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="w-100 d-flex justify-content-end">
                                        <a href="#" class="btn btn-primary">Adicionar</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-0">Outros Projetos</h5>
                                </div>
                                <div class="card-body overflow-hidden w-100 d-block">
                                    <div class="carousel d-block">
                                        <div class="carousel-item">
                                            <a class="badge badge-danger position-absolute m-1 p-1"><i class="fa-solid fa-2x fa-trash-can"></i></a>
                                            <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="w-100 d-flex justify-content-end">
                                        <a href="#" class="btn btn-primary">Adicionar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                
            </div>
            <!-- Default to the left -->
            <strong>Anything you want</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="./plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/adminlte.min.js"></script>
    <script src="https://kit.fontawesome.com/539eca1b92.js" crossorigin="anonymous"></script>
</body>

</html>