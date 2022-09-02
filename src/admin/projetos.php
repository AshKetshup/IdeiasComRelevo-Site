<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
$app_instance = new IdeiasComRelevo();

$login = IdeiasComRelevo::verify_login();
if (!$login)
    header("Location: /admin/login");
?>
<!DOCTYPE html>
<html lang="pt">

<!-- 
    This contains the head part of the file.
    To set the page name change the $PAGE_NAME variable
-->
<?php
$PAGE_NAME = "Projetos";
$PAGE_ID = "projetos";
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
                                                <th>Titulo</th>
                                                <th>Localização</th>
                                                <th>Tipo de edificio</th>
                                                <th>Estado</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($app_instance->ProjectsManagement->admin_get_projects() as $project) : ?>
                                                <tr id="<?= $project->get_id() ?>">
                                                    <td><?= $project->get_title() ?></td>
                                                    <td><?= $project->get_zone() ?>, <?= $project->get_county() ?>, <?= $project->get_city() ?></td>
                                                    <td><?= ProjectsManagement::building_type_id_to_string($project->get_building_type()) ?></td>
                                                    <td><?= ProjectsManagement::building_state_id_to_string($project->get_state()) ?></td>
                                                    <td>
                                                        <a class="badge bg-warning p-1 px-2 mr-1" title="Editar" href="/admin/create_project.php?id=<?= $project->get_id() ?>"><i class="fa-solid fa-pen"></i></a>
                                                        <a class="badge bg-danger p-1 px-2 mr-1 btn-delete" title="Eliminar" data-toggle="modal" data-target="#confirmElimination">
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
                                        <a href="/admin/create_project" class="btn btn-primary">Criar</a>
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

        <!-- Modal -->
        <div class="modal fade" id="confirmElimination" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="confirmEliminationLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmEliminationLabel">Confirmação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Ao confirmar irás eliminar o elemento selecionado. Tens a certeza?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a id="deleteModalBtn" class="btn btn-danger" href="">Confirmar</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main Footer -->
        <?php include_once '../includes/admin/footer.php'; ?>

    </div>
    <!-- ./wrapper -->

    <script>
        const elements = document.getElementsByClassName("btn-delete");
        const modalLink = document.getElementById("deleteModalBtn");
        for (const element of elements) {
            const id = element.closest("tr").getAttribute("id");
            element.addEventListener("click", () => {
                modalLink.setAttribute("href", "/backend/post_scripts/delete_project.php?id=" + id);
            });
        }
    </script>

    <!-- REQUIRED SCRIPTS -->
    <?php include_once '../includes/admin/scripts.php'; ?>

</body>

</html>