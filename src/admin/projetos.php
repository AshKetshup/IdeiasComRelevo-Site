<!DOCTYPE html>
<html lang="pt">

<!-- 
    This contains the head part of the file.
    To set the page name change the $PAGE_NAME variable
-->
<?php 
    $PAGE_NAME = "Projetos";
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
        <?php include_once '../includes/admin/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="pb-2">Projetos</h1>
                            <p class="mb-0">Lista dos projetos disponiveis no site.</p>
                            <p class="mb-1"></p>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Projetos</li>
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
                                    <h5 class="m-0">Projetos</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-hover shadow">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Titulo</th>
                                                <th>Localização</th>
                                                <th>Tipo de edificio</th>
                                                <th>Estado</th>
                                                <th>Data</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                                <td>Zona, Concelho, Freguesia</td>
                                                <td>Moradia Germinada</td>
                                                <td>Vendido</td>
                                                <td>24-12-2021</td>
                                                <td>
                                                    <a class="badge bg-warning p-1 px-2 mr-1" title="Editar" href=""><i class="fa-solid fa-pen"></i></a>
                                                    <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                                <td>Zona, Concelho, Freguesia</td>
                                                <td>Moradia Germinada</td>
                                                <td>Vendido</td>
                                                <td>24-12-2021</td>
                                                <td>
                                                    <a class="badge bg-warning p-1 px-2 mr-1" title="Editar" href=""><i class="fa-solid fa-pen"></i></a>
                                                    <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                                <td>Zona, Concelho, Freguesia</td>
                                                <td>Moradia Germinada</td>
                                                <td>Vendido</td>
                                                <td>24-12-2021</td>
                                                <td>
                                                    <a class="badge bg-warning p-1 px-2 mr-1" title="Editar" href=""><i class="fa-solid fa-pen"></i></a>
                                                    <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                                <td>Zona, Concelho, Freguesia</td>
                                                <td>Moradia Germinada</td>
                                                <td>Vendido</td>
                                                <td>24-12-2021</td>
                                                <td>
                                                    <a class="badge bg-warning p-1 px-2 mr-1" title="Editar" href=""><i class="fa-solid fa-pen"></i></a>
                                                    <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5.</td>
                                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                                <td>Zona, Concelho, Freguesia</td>
                                                <td>Moradia Germinada</td>
                                                <td>Vendido</td>
                                                <td>24-12-2021</td>
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