<!DOCTYPE html>
<html lang="pt">

<!-- 
    This contains the head part of the file.
    To set the page name change the $PAGE_NAME variable
-->
<?php 
    $PAGE_NAME = "Associados";
    $PAGE_ID = "associados";
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
        <?php include_once '../includes/admin/navbar.php'; ?>
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
                            <h1 class="pb-2">Associados</h1>
                            <p class="mb-0">Lista de todos os Associados mencianados no site.</p>
                            <p class="mb-1"></p>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Associados</li>
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
                                    <h5 class="m-0">Associados</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-hover shadow">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th style="min-width: min-content;">Imagem</th>
                                                <th>Nome</th>
                                                <th>Website</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td class="d-flex" style="min-width: min-content;"><img src="https://www.ubi.pt/Ficheiros/Sites/75/Noticias/887/vantagens%20aaubi.jpg" alt="" style="max-height:100px"></td>
                                                <td>Nome da Empresa</td>
                                                <td>https://www.website.com/</td>
                                                <td>
                                                    <a class="badge bg-warning p-1 px-2 mr-1" title="Editar" href=""><i
                                                            class="fa-solid fa-pen"></i></a>
                                                    <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i
                                                            class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td class="d-flex" style="min-width: min-content;"><img src="https://www.ubi.pt/Ficheiros/Sites/75/Noticias/887/vantagens%20aaubi.jpg" alt="" style="max-height:100px"></td>
                                                <td>Nome da Empresa</td>
                                                <td>https://www.website.com/</td>
                                                <td>
                                                    <a class="badge bg-warning p-1 px-2 mr-1" title="Editar" href=""><i
                                                            class="fa-solid fa-pen"></i></a>
                                                    <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i
                                                            class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td class="d-flex" style="min-width: min-content;"><img src="https://www.ubi.pt/Ficheiros/Sites/75/Noticias/887/vantagens%20aaubi.jpg" alt="" style="max-height:100px"></td>
                                                <td>Nome da Empresa</td>
                                                <td>https://www.website.com/</td>
                                                <td>
                                                    <a class="badge bg-warning p-1 px-2 mr-1" title="Editar" href=""><i
                                                            class="fa-solid fa-pen"></i></a>
                                                    <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i
                                                            class="fa-solid fa-trash-can"></i></a>
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
                                        <a type="submit" href="#" class="btn btn-primary">Adicionar</a>
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
        <?php include_once '../includes/admin/footer.php'; ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include_once '../includes/admin/scripts.php'; ?>
    
</body>

</html>