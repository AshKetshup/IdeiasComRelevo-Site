<!DOCTYPE html>
<html lang="pt">

<!-- 
    This contains the head part of the file.
    To set the page name change the $PAGE_NAME variable
-->
<?php 
    $PAGE_NAME = "Contactos";
    include_once '../includes/admin/head.php'; 
?>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    input[type=number] {
        -moz-appearance: textfield;
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
                            <a class="nav-item nav-link" href="/admin/acabamentos">
                                <i class="nav-icon fas fa-brush"></i>
                                Acabamentos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link active" href="/admin/contactos">
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
                            <h1 class="pb-2">Contactos</h1>
                            <p class="mb-0">Lista dos contactos disponiveis no site.</p>
                            <p class="mb-1"></p>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Contactos</li>
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
                                    <h5 class="m-0">Contactos</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-hover shadow">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Campo</th>
                                                <th>Valor</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>Nº Telemovel</td>
                                                <td>+3519XXXXXXXX</td>
                                                <td>
                                                    <a class="badge bg-warning p-1 px-2 mr-1" title="Editar" href=""><i class="fa-solid fa-pen"></i></a>
                                                    <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Email</td>
                                                <td>email@email.email</td>
                                                <td>
                                                    <a class="badge bg-warning p-1 px-2 mr-1" title="Editar" href=""><i class="fa-solid fa-pen"></i></a>
                                                    <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>Sede</td>
                                                <td>Rua da quinta da glória usada, 2222-001</td>
                                                <td>
                                                    <a class="badge bg-warning p-1 px-2 mr-1" title="Editar" href=""><i class="fa-solid fa-pen"></i></a>
                                                    <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer d-flex">
                                    <div class="w-50 d-flex justify-content-lg-start">
                                        <ul class="pagination pagination-sm m-0 float-right">
                                            <li class="page-item"><a class="page-link text-muted" href="#">«</a></li>
                                            <li class="page-item"><a class="page-link text-muted" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link text-muted" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link text-muted" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link text-muted" href="#">»</a></li>
                                        </ul>
                                    </div>
                                    <div class="w-50 d-flex justify-content-end">
                                        <a type="submit" href="#" class="btn btn-primary">Criar</a>
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

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->        
        <?php include_once '../includes/admin/footer.php'; ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include_once '../includes/admin/head.php'; ?>
    
</body>

</html>