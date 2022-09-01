<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    $login = IdeiasComRelevo::verify_login();
    if(!$login)
        header("Location: /admin/login");

    $users = $app_instance->UserManagement->get_users();
?>
<!DOCTYPE html>
<html lang="pt">

<!-- 
    This contains the head part of the file.
    To set the page name change the $PAGE_NAME variable
-->
<?php 
    $PAGE_NAME = "Utilizadores";
    $PAGE_ID = "utilizadores";
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
                            <h1 class="pb-2">Utilizadores</h1>
                            <p class="mb-0">Lista de todos os Utilizadores registados na administração.</p>
                            <p class="mb-1"></p>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Utilizadores</li>
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
                                    <h5 class="m-0">Utilizadores</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-hover shadow">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>E-Mail</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($users as $user): ?>
                                                <tr>
                                                    <td><?= $user->get_name() ?></td>
                                                    <td><?= $user->get_email() ?></td>
                                                    <td>
                                                        <?php if($login['uid'] != $user->get_id()): ?>
                                                            <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" 
                                                                href="/backend/post_scripts/delete_user.php?id=<?= $user->get_id() ?>">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer d-flex">
                                    <div class="w-100 d-flex justify-content-end">
                                        <button class="btn btn-primary" data-toggle="modal" 
                                            data-target="#modalCreateUser">
                                            Criar
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
    <div class="modal fade" id="modalCreateUser" tabindex="-1" role="dialog" 
        aria-labelledby="#modalCreateUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <form id="formModal" onsubmit="return checkContent()" class="w-100 card modal-content" action="/backend/post_scripts/create_user.php" 
                method="post">
                <div class="card-header modal-header">
                    <h5 class="m-0">Criar um Utilizador</h5>
                </div>
                <div class="card-body modal-body">
                    <div class="form-group col">
                        <label for="inputName">Nome (*)</label>
                        <input class="form-control" type="text" name="nome" id="inputName" placeholder="Insira um nome" 
                            required>
                    </div>
                    <div class="form-group col">
                        <label for="inputEmail">E-Mail (*)</label>
                        <input class="form-control" type="email" name="email" id="inputEmail" placeholder="Insira um E-Mail" 
                            required>
                    </div>
                    <div class="form-group col">
                        <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" -->
                        <label for="inputPwd1">Password (*)</label>
                        <input class="form-control" type="password" name="password" id="inputPwd1" 
                            placeholder="Insira uma Password">
                    </div>
                    <div class="form-group col">
                        <label for="inputPwd2">Confirmar Password (*)</label>
                        <input class="form-control" type="password" name="passwordConfirmacao" id="inputPwd2" 
                            placeholder="Insira uma Password">
                    </div>
                </div>
                <div class="card-footer modal-footer d-flex">
                    <div class="w-100 d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary ml-1">Confirmar</button>
                    </div>
                </div>
            </form>
            <script>
                function checkContent() {
                    const pwd1 = document.getElementById("inputPwd1");
                    const pwd2 = document.getElementById("inputPwd2");

                    if (pwd1.value != pwd2.value) {
                        event.preventDefault();
                        return false;
                    }

                    return true;
                }
            </script>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <?php include_once '../includes/admin/scripts.php'; ?>
    
</body>

</html>