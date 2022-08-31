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
    $PAGE_NAME = "Acabamentos";
    $PAGE_ID = "acabamentos";
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
                                        <?php foreach($app_instance->FinishesManagement->admin_get_finishes(0) as $finish): ?>
                                            <div class="carousel-item">
                                                <a class="badge badge-danger position-absolute m-1 p-1" href="/backend/post_scripts/delete_finish.php?id=<?= $finish->get_id() ?>"><i class="fa-solid fa-2x fa-trash-can"></i></a>
                                                <img src="<?= $finish->get_image() ?>">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="w-100 d-flex justify-content-end">
                                        <button id="btnAddWC" class="btn btn-primary" data-toggle="modal" 
                                            data-target="#modalSendImage">Adicionar</button>
                                        <!-- TODO: ACTIVATE MODAL TO FORM TO IMAGE -->
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-0">Cozinhas e Salas</h5>
                                </div>
                                <div class="card-body overflow-hidden w-100 d-block">
                                    <div class="carousel d-block">
                                        <?php foreach($app_instance->FinishesManagement->admin_get_finishes(1) as $finish): ?>
                                            <div class="carousel-item">
                                                <a class="badge badge-danger position-absolute m-1 p-1" href="/backend/post_scripts/delete_finish.php?id=<?= $finish->get_id() ?>"><i class="fa-solid fa-2x fa-trash-can"></i></a>
                                                <img src="<?= $finish->get_image() ?>">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="w-100 d-flex justify-content-end">
                                        <button id="btnAddCS" class="btn btn-primary" data-toggle="modal" 
                                            data-target="#modalSendImage">Adicionar</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-0">Arranjos e Soluções Exteriores</h5>
                                </div>
                                <div class="card-body overflow-hidden w-100 d-block">
                                    <div class="carousel d-block">
                                        <?php foreach($app_instance->FinishesManagement->admin_get_finishes(2) as $finish): ?>
                                            <div class="carousel-item">
                                                <a class="badge badge-danger position-absolute m-1 p-1" href="/backend/post_scripts/delete_finish.php?id=<?= $finish->get_id() ?>"><i class="fa-solid fa-2x fa-trash-can"></i></a>
                                                <img src="<?= $finish->get_image() ?>">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="w-100 d-flex justify-content-end">
                                        <button id="btnAddAS" class="btn btn-primary" data-toggle="modal" 
                                            data-target="#modalSendImage">Adicionar</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-0">Outros Projetos</h5>
                                </div>
                                <div class="card-body overflow-hidden w-100 d-block">
                                    <div class="carousel d-block">
                                        <?php foreach($app_instance->FinishesManagement->admin_get_finishes(3) as $finish): ?>
                                            <div class="carousel-item">
                                                <a class="badge badge-danger position-absolute m-1 p-1" href="/backend/post_scripts/delete_finish.php?id=<?= $finish->get_id() ?>"><i class="fa-solid fa-2x fa-trash-can"></i></a>
                                                <img src="<?= $finish->get_image() ?>">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="w-100 d-flex justify-content-end">
                                        <button id="btnAddOP" class="btn btn-primary" data-toggle="modal" 
                                            data-target="#modalSendImage">Adicionar</button>
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
    <div class="modal fade" id="modalSendImage" tabindex="-1" role="dialog" 
        aria-labelledby="modalSendImage" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <form id="formModal" class="w-100 card modal-content" action="" method="post" enctype="multipart/form-data">
                <div class="card-header modal-header">
                    <h5 class="m-0">Add Image</h5>
                </div>
                <div class="card-body modal-body">
                    <div class="form-group">
                        <label for="inputImage">Selecione uma Imagem</label>
                        <input class="form-control" type="file" name="imagem" id="inputImage" accept="image/*">
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


    <script>
        let actionLink = "/backend/post_scripts/add_finish.php";
        let formModal = document.getElementById("formModal");

        document.getElementById("btnAddWC").addEventListener("click", () => {
            let category = "WC";

            // CHANGE MODAL ACTION PATH
            formModal.action = actionLink + "?categoria=" + category;
        });

        document.getElementById("btnAddCS").addEventListener("click", () => {
            let category = "CS";

            // CHANGE MODAL ACTION PATH
            formModal.action = actionLink + "?categoria=" + category;
        });

        document.getElementById("btnAddAS").addEventListener("click", () => {
            let category = "AS";

            // CHANGE MODAL ACTION PATH
            formModal.action = actionLink + "?categoria=" + category;
        });

        document.getElementById("btnAddOP").addEventListener("click", () => {
            let category = "OP";

            // CHANGE MODAL ACTION PATH
            formModal.action = actionLink + "?categoria=" + category;
        });
    </script>
    <!-- REQUIRED SCRIPTS -->
    <?php include_once '../includes/admin/scripts.php'; ?>
    
</body>

</html>