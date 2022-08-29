<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    $login = IdeiasComRelevo::verify_login();
    if(!$login)
        header("Location: /admin/login");

        $contacts = $app_instance->ContactsManagement->get_contacts();
?>
<!DOCTYPE html>
<html lang="pt">

<!-- 
    This contains the head part of the file.
    To set the page name change the $PAGE_NAME variable
-->
<?php
$PAGE_NAME = "Contactos";
$PAGE_ID = "contactos";
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
                                                <th>Campo</th>
                                                <th>Valor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nº Telemovel</td>
                                                <td><?= $contacts["phone"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?= $contacts["email"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sede</td>
                                                <td><?= $contacts["office"] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer d-flex">
                                    <div class="w-100 d-flex justify-content-end">
                                        <button type="button" href="#" class="btn btn-primary" data-toggle="modal" 
                                            data-target="#modalContactForm">
                                            Alterar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal -->
        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" 
            aria-labelledby="modalContactForm" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <form class="w-100 card modal-content" action="/backend/post_scripts/change_contacts.php" method="post">
                    <div class="card-header modal-header">
                        <h5 class="m-0">Alterar Contactos</h5>
                    </div>
                    <div class="card-body modal-body">
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="inputTelemovel">Telemovel</label>
                                <input id="inputTelemovel" class="form-control" type="text" name="telemovel" 
                                placeholder="Insira a nº Telemovel" required value="<?= $contacts["phone"] ?>">

                                <div class="valid-feedback">Valido.</div>
                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                            </div>
                            <div class="form-group col-7">
                                <label for="inputEmail">E-Mail</label>
                                <input id="inputEmail" class="form-control" type="text" name="email" 
                                placeholder="Insira o endereço E-mail" required value="<?= $contacts["email"] ?>">

                                <div class="valid-feedback">Valido.</div>
                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="inputSede">Sede</label>
                                <textarea id="inputSede" class="form-control" type="text" name="sede"
                                placeholder="Insira a morada da Sede" required><?= $contacts["office"] ?></textarea>

                                <div class="valid-feedback">Valido.</div>
                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                            </div>
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
        <!-- /.container-fluid -->

        <!-- Main Footer -->
        <?php include_once '../includes/admin/footer.php'; ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include_once '../includes/admin/scripts.php'; ?>

</body>

</html>