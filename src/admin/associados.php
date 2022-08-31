<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    $login = IdeiasComRelevo::verify_login();
    if(!$login)
        header("Location: /admin/login");
?>
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
                                                <th style="min-width: min-content;">Imagem</th>
                                                <th>Nome</th>
                                                <th>Website</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($app_instance->AssociateManagement->admin_get_associates() as $associate): ?>
                                                <tr>
                                                    <td class="d-flex" style="min-width: min-content;"><img src="<?= $associate->get_logo() ?>" alt="" style="max-height:100px"></td>
                                                    <td><?= $associate->get_name() ?></td>
                                                    <td><?= $associate->get_website() ?></td>
                                                    <td>
                                                        <button class="badge bg-warning p-1 px-2 mr-1 editBtn" title="Editar" href="">
                                                            <i class="fa-solid fa-pen"></i>
                                                        </button>
                                                        <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" 
                                                            href="/backend/post_scripts/delete_associate.php?id=<?= $associate->get_id() ?>">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer d-flex">
                                    <div class="w-100 d-flex justify-content-end">
                                        <button class="btn btn-primary" data-toggle="modal" 
                                            data-target="#modalCreateAssociado">
                                            Adicionar
                                        </button>
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

    <!-- Modal -->
    <div class="modal fade" id="modalCreateAssociado" tabindex="-1" role="dialog" 
        aria-labelledby="modalCreateAssociado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <form id="formModal" class="w-100 card modal-content" action="/backend/post_scripts/create_associates.php" 
                method="post" enctype="multipart/form-data">
                <div class="card-header modal-header">
                    <h5 class="m-0">Adicionar um Associado</h5>
                </div>
                <div class="card-body modal-body">
                    <div class="form-group col-12">
                        <label for="inputImage">Selecione uma Imagem (*)</label>
                        <input class="form-control" type="file" name="imagem" id="inputImage" accept="image/*" required>
                    </div>
                    <div class="form-group col">
                        <label for="inputName">Nome (*)</label>
                        <input class="form-control" type="text" name="nome" id="inputName" placeholder="Insira um nome" 
                            required>
                    </div>
                    <div class="form-group col">
                        <label for="inputSite">Website</label>
                        <input class="form-control" type="text" name="nome" id="inputName" placeholder="Insira um URL">
                    </div>
                </div>
                <div class="card-footer modal-footer d-flex">
                    <div class="w-100 d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary ml-1">Confirmar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <?php include_once '../includes/admin/scripts.php'; ?>
    
</body>

</html>