<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
$app_instance = new IdeiasComRelevo();

$project = $app_instance->ProjectsManagement->get_project($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/head.php'; ?>

<style>
    *,
    *::before,
    *::after {
        scroll-behavior: smooth;
    }
</style>

<body class="index-page sidebar-collapse">
    <!-- Navbar -->
    <?php
    $PAGE_ID = "produto";
    include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/nav.php';
    ?>

    <!-- End Navbar -->

    <div class="container d-flex justify-content-center mb-2 flex-column" style="margin-top: 90px;">
        <div id="carousel-product" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php for ($i = 0; $i < count($project->get_photos()); $i++) {
                    if ($i == 0) {
                        echo '<li data-target="#carousel-product" data-slide-to="' . $i . '" class="active"></li>';
                        continue;
                    }

                    echo '<li data-target="#carousel-product" data-slide-to="' . $i . '"></li>';
                } ?>
            </ol>
            <div class="carousel-inner" style="height: 500px" role="listbox">
                <?php
                $x = 0;
                foreach ($project->get_photos() as $photo) {
                    echo (
                        ($x == 0)
                        ? '<div class="carousel-item active">'
                        : '<div class="carousel-item h-100 w-100">'
                    ) . '<img class="d-block" src="/uploads/' . $photo . '" style="width: 100%; min-height: 100%; vertical-align: middle;"></div>';

                    $x++;
                }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carousel-product" role="button" data-slide="prev">
                <i class="now-ui-icons arrows-1_minimal-left"></i>
            </a>
            <a class="carousel-control-next" href="#carousel-product" role="button" data-slide="next">
                <i class="now-ui-icons arrows-1_minimal-right"></i>
            </a>
        </div>

        <h2 class="w-100 m-0 p-0 mt-3" id="product-title"><b><?= $project->get_title() ?></b></h2>
        <h4 class="w-100 m-0 p-0 mt-1" id="product-location"><?= $project->get_city() ?>, <?= $project->get_county() ?>, <?= $project->get_zone() ?></h4>
        <h2 class="w-100 m-0 p-0 mt-3" id="product-price"><?= $project->get_value() ?> €</h2>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-fill m-0 p-0 mt-3 mb-2" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#descrição" role="tab" aria-controls="descrição" aria-selected="true">Descrição</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pisos-tab" data-toggle="tab" href="#pisos" role="tab" aria-controls="pisos" aria-selected="false">Pisos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Informação</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="descrição" role="tabpanel" aria-labelledby="descrição-tab" style="min-height: 50vh;">
                <?= $project->get_description() ?>
            </div>
            <div class="tab-pane" id="pisos" role="tabpanel" aria-labelledby="pisos-tab" style="height: 50vh;">
                <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <button class="btn btn-link btn-block text-left h3 my-0 py-0 " data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Collapsible Group Item #1

                                <i class="now-ui-icons arrows-1_minimal-down"></i>
                            </button>
                        </div>

                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body">
                                <h3 class="col-12">Detalhes</h3>
                                <div class="col-6">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="info" role="tabpanel" aria-labelledby="info-tab" style="height: 50vh;">.....</div>
        </div>


        <style>
            .nav-tabs {
                border-bottom: solid rgb(249, 99, 50);
            }

            .nav-link.active {
                background-color: rgb(249, 99, 50) !important;
                border-radius: 0 !important;
            }
        </style>
    </div>

    <!-- footer -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/footer.php'; ?>

    <!-- scripts -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/scripts.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
        let desc = document.getElementById("descrição");

        desc.innerHTML = marked.parse(desc.innerText);
    </script>

</body>

</html>