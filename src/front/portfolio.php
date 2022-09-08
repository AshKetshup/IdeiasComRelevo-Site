<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
$app_instance = new IdeiasComRelevo();

$finishes = [
    "WC" => $app_instance->FinishesManagement->admin_get_finishes(FinishesManagement::catshort_to_id("WC")),
    "CS" => $app_instance->FinishesManagement->admin_get_finishes(FinishesManagement::catshort_to_id("CS")),
    "AS" => $app_instance->FinishesManagement->admin_get_finishes(FinishesManagement::catshort_to_id("AS")),
    "OP" => $app_instance->FinishesManagement->admin_get_finishes(FinishesManagement::catshort_to_id("OP"))
];
?>
<!DOCTYPE html>
<html lang="pt">

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
    $PAGE_ID = "portfolio";
    include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/nav.php';
    ?>

    <?php

    function finishTracker($finishes, $id)
    {
        for ($i = 0; $i < count($finishes[$id]); $i++) {
            $finish = $finishes[$id][$i];

            if ($i == 0) {
                echo '<li data-target="#carousel-' . $id . '" data-slide-to="' . $finish->get_id() . '" class="active"></li>';
                continue;
            }

            echo '<li data-target="#carousel-' . $id . '" data-slide-to="' . $finish->get_id() . '"></li>';
        }
    }

    function finishImages($finishes, $id)
    {
        $x = 0;

        foreach ($finishes[$id] as $finish) {
            echo (
                ($x == 0)
                ? '<div class="carousel-item h-100 w-100 active">'
                : '<div class="carousel-item h-100 w-100">'
            ) . '<img class="d-block" src="/uploads/' . $finish->get_image() . '" style="min-width: 100%; height: 100%; vertical-align: middle; object-fit: cover;"></div>';

            $x++;
        }
    }

    ?>

    <!-- End Navbar -->
    <div class="container" style="margin-top: 90px; min-height: 50vh">
        <h1 class="py-3">Portfolio</h1>
        

        <ul class="nav nav-tabs nav-fill m-0 p-0 mt-3 mb-2" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="acabamentos-tab" data-toggle="tab" href="#acabamentos" role="tab" aria-controls="acabamentos" aria-selected="true">Acabamentos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">Sobre Nós</a>
            </li>
        </ul>
        <div class="tab-content mb-4 pt-2">
            <div class="tab-pane active" id="acabamentos" role="tabpanel" aria-labelledby="acabamentos-tab">
                <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                    <div class="card my-2">
                        <div class="card-header" role="tab" id="headingWCs">
                            <button class="btn btn-link btn-block text-left h4 my-3 py-0" data-toggle="collapse" data-parent="#accordion" href="#collapseWCs" aria-expanded="false" aria-controls="collapseWCs">
                                <i class="now-ui-icons arrows-1_minimal-down mx-2"></i>
                                Casas De Banho
                            </button>
                        </div>

                        <div id="collapseWCs" class="collapse" role="tabpanel" aria-labelledby="headingWCs">
                            <div class="card-body d-flex">

                                <div id="carousel-WC" class="carousel slide w-100" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php finishTracker($finishes, "WC"); ?>
                                    </ol>
                                    <div class="carousel-inner" style="height: 500px; width: 100%" role="listbox">
                                        <?php finishImages($finishes, "WC"); ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-WC" role="button" data-slide="prev">
                                        <i class="now-ui-icons arrows-1_minimal-left"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-WC" role="button" data-slide="next">
                                        <i class="now-ui-icons arrows-1_minimal-right"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card my-2">
                        <div class="card-header" role="tab" id="headingCozSalas">
                            <button class="btn btn-link btn-block text-left h4 my-3 py-0" data-toggle="collapse" data-parent="#accordion" href="#collapseCozSalas" aria-expanded="false" aria-controls="collapseCozSalas">
                                <i class="now-ui-icons arrows-1_minimal-down mx-2"></i>
                                Cozinhas e Salas
                            </button>
                        </div>

                        <div id="collapseCozSalas" class="collapse" role="tabpanel" aria-labelledby="headingCozSalas">
                            <div class="card-body d-flex">

                                <div id="carousel-CS" class="carousel slide w-100" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php finishTracker($finishes, "CS"); ?>
                                    </ol>
                                    <div class="carousel-inner" style="height: 500px; width: 100%" role="listbox">
                                        <?php finishImages($finishes, "CS"); ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-CS" role="button" data-slide="prev">
                                        <i class="now-ui-icons arrows-1_minimal-left"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-CS" role="button" data-slide="next">
                                        <i class="now-ui-icons arrows-1_minimal-right"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card my-2">
                        <div class="card-header" role="tab" id="headingArranjos">
                            <button class="btn btn-link btn-block text-left h4 my-3 py-0" data-toggle="collapse" data-parent="#accordion" href="#collapseArranjos" aria-expanded="false" aria-controls="collapseArranjos">
                                <i class="now-ui-icons arrows-1_minimal-down mx-2"></i>
                                Arranjos e Soluções Exteriores
                            </button>
                        </div>

                        <div id="collapseArranjos" class="collapse" role="tabpanel" aria-labelledby="headingArranjos">
                            <div class="card-body d-flex">

                                <div id="carousel-AS" class="carousel slide w-100" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php finishTracker($finishes, "AS"); ?>
                                    </ol>
                                    <div class="carousel-inner" style="height: 500px; width: 100%" role="listbox">
                                        <?php finishImages($finishes, "AS"); ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-AS" role="button" data-slide="prev">
                                        <i class="now-ui-icons arrows-1_minimal-left"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-AS" role="button" data-slide="next">
                                        <i class="now-ui-icons arrows-1_minimal-right"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card my-2">
                        <div class="card-header" role="tab" id="headingProjetos">
                            <button class="btn btn-link btn-block text-left h4 my-3 py-0" data-toggle="collapse" data-parent="#accordion" href="#collapseProjetos" aria-expanded="false" aria-controls="collapseProjetos">
                                <i class="now-ui-icons arrows-1_minimal-down mx-2"></i>
                                Outros Projetos e Obras
                            </button>
                        </div>

                        <div id="collapseProjetos" class="collapse" role="tabpanel" aria-labelledby="headingProjetos">
                            <div class="card-body d-flex">

                                <div id="carousel-OP" class="carousel slide w-100" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php finishTracker($finishes, "OP"); ?>
                                    </ol>
                                    <div class="carousel-inner" style="height: 500px; width: 100%" role="listbox">
                                        <?php finishImages($finishes, "OP"); ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-OP" role="button" data-slide="prev">
                                        <i class="now-ui-icons arrows-1_minimal-left"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-OP" role="button" data-slide="next">
                                        <i class="now-ui-icons arrows-1_minimal-right"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="about" role="tabpanel" aria-labelledby="about-tab">
                <div class="card my-2">
                    <div class="card-body text-justify" id="about-us"><?= $app_instance->ContactsManagement->get_contacts()["aboutus"] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/footer.php'; ?>

    <!-- scripts -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/scripts.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
        let aboutus = document.getElementById("about-us");

        aboutus.innerHTML = marked.parse(aboutus.innerText);
    </script>
</body>

</html>