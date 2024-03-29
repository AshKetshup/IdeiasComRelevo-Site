<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
$app_instance = new IdeiasComRelevo();

$project = $app_instance->ProjectsManagement->get_project($_GET['id']);
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
                        ? '<div class="carousel-item h-100 w-100 active">'
                        : '<div class="carousel-item h-100 w-100">'
                    ) . '<img class="d-block" src="/uploads/' . $photo . '" style="min-width: 100%; height: 100%; vertical-align: middle; object-fit: cover;"></div>';

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
        <h2 class="w-100 m-0 p-0 mt-3" id="product-price"><?php $value = $project->get_value(); ?>
            <?php if ($project->get_building_type() == 1) : ?>
                <h3 class="col-12 m-0 p-0">
                    A partir de <br>
                    <?php if (isset($value["sell"])) : ?>
                        <b><?= $value["sell"] ?>€</b>
                    <?php endif; ?> ou <?php if (isset($value["rent"])) : ?>
                        <b><?= $value["rent"] ?>€/mês</b>
                    <?php endif; ?>
                </h3>
            <?php else : ?>
                <h3 class="col-12 m-0 p-0">
                    <?php if ($project->get_state() == 1) : ?>
                        <b><?= $value ?>€</b>
                    <?php else : ?>
                        <?php if ($project->get_state() == 2) : ?>
                            <b><?= $value ?>€/mês</b>
                        <?php else : ?>
                            <b>Vendido</b>
                        <?php endif; ?>
                    <?php endif; ?>
                </h3>
            <?php endif; ?>

        </h2>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-fill m-0 p-0 mt-3 mb-2" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#descrição" role="tab" aria-controls="descrição" aria-selected="true">Descrição</a>
            </li>
            
            <?php if ($project->get_building_type() == 1): ?>
            <li class="nav-item">
                <a class="nav-link" id="pisos-tab" data-toggle="tab" href="#pisos" role="tab" aria-controls="pisos" aria-selected="false">Pisos</a>
            </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Informação</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active px-4" id="descrição" role="tabpanel" aria-labelledby="descrição-tab" style="min-height: 50vh;"><?=
                str_replace("\n", "<br />", $project->get_description())
            ?></div>

            <?php if ($project->get_building_type() == 1): ?>
            <div class="tab-pane" id="pisos" role="tabpanel" aria-labelledby="pisos-tab" style="min-height: 50vh;">
                <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                    <?php
                    $pisosArray = array();
                    foreach ($project->get_appartments() as $typ) {
                        $pisosArray[$typ->get_floor()][] = $typ;
                    }
                    ?>

                    <?php
                    foreach ($pisosArray as $floor) {
                        $floorKey = array_search($floor, $pisosArray);
                        echo '
                        <div class="card my-2">
                            <div class="card-header" role="tab" id="heading' . $floorKey . '">
                                <button class="btn btn-link btn-block text-left h4 my-3 py-0" data-toggle="collapse" data-parent="#accordion" href="#collapse' . $floorKey . '" aria-expanded="true" aria-controls="collapse' . $floorKey . '">
                                    <i class="now-ui-icons arrows-1_minimal-down mx-2"></i>
                                    Piso ' . $floorKey . '
                                </button>
                            </div>

                            <div id="collapse' . $floorKey . '" class="collapse" role="tabpanel" aria-labelledby="heading' . $floorKey . '">
                                <div class="card-body d-flex flex-wrap justify-content-around">';

                        foreach ($floor as $appt) {
                            echo '
                                    <div class="col-lg-5 card p-0 m-0 d-flex flex-wrap flex-row">
                                        <h4 class="col-12 m-0 py-1 px-3 text-center bg-primary card-header text-white">
                                            <b>Apartamentos ' . $appt->get_typology() . '</b>
                                        </h4>
                                        <div class="col-md-6 py-2">
                                            <div class="col-12 px-0">
                                                <b>Área:</b>
                                            </div>
                                            <div class="col-12 px-0">
                                                ' . $appt->get_area() . ' m<sup>2</sup>
                                            </div>
                                        </div>
                                        <div class="col-md-6 py-2">
                                            <div class="col-12 px-0">
                                                <b>Categoria Energética</b>:
                                            </div>
                                            <div class="col-12 px-0">
                                                ' . $appt->get_energy_category() . '
                                            </div>
                                        </div>
                                        <div class="col-md-6 py-2">
                                            <div class="col-12 px-0">
                                                <b>Tipologia:</b>
                                            </div>
                                            <div class="col-12 px-0">
                                                ' . $appt->get_typology() . '
                                            </div>
                                        </div>
                                        <div class="col-md-6 py-2">
                                            <div class="col-12 px-0">
                                                <b>WCs:</b>
                                            </div>
                                            <div class="col-12 px-0">
                                                ' . $appt->get_wc_count() . '
                                            </div>
                                        </div>
                                        <div class="col-md-6 py-2">
                                            <div class="col-12 px-0">
                                                <b>Estacionamento:</b>
                                            </div>
                                            <div class="col-12 px-0">
                                                ' . (($appt->get_has_parking()) ? "Sim" : "Não") . '
                                            </div>
                                        </div>
                                        <div class="col-md-6 py-2">
                                            <div class="col-12 px-0">
                                                <b>Garagem:</b>
                                            </div>
                                            <div class="col-12 px-0">
                                                ' . (($appt->get_has_garage()) ? "Sim" : "Não") . '
                                            </div>
                                        </div>
                                        <div class="col-12 py-2">
                                            <div class="col-12 px-0">
                                                <b>Descrição:</b>
                                            </div>
                                            <div class="col-12 px-0">
                                                ' . $appt->get_description() . '
                                            </div>
                                        </div>
                                        <h4 class="col-12 m-0 py-1 px-3 text-right bg-primary card-footer text-white">
                                            <b>' . (function ($appt) {
                                    if ($appt->get_rent_price() == 0 && $appt->get_sell_price() == 0)
                                        return "Vendido";

                                    $result = "";
                                    if ($appt->get_rent_price() != 0)
                                        $result = $result . $appt->get_rent_price() . "€/mês" . (($appt->get_sell_price() != 0) ? " ou " : "");

                                    if ($appt->get_sell_price() != 0)
                                        $result = $result . $appt->get_sell_price() . "€";

                                    return $result;
                                })($appt) . '
                                            </b>
                                        </h4>
                                    </div>
                                ';
                        }

                        echo '
                                </div>
                            </div>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="tab-pane" id="info" role="tabpanel" aria-labelledby="info-tab" style="min-height: 50vh;">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr class="">
                                <td class="text-left pl-5">
                                    <b>Tipo Edificio</b>
                                </td>
                                
                                <td class="text-right pr-5">
                                    <?= ProjectsManagement::building_type_id_to_string($project->get_building_type()) ?>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="text-left pl-5">
                                    <b>Nº Pisos</b>
                                </td>
                                
                                <td class="text-right pr-5">
                                    <?= $project->get_floor_count() ?>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="text-left pl-5">
                                    <b>Inclui Elevador</b>
                                </td>
                                
                                <td class="text-right pr-5">
                                    <?= (($project->get_has_elevator()) ? "Sim" : "Não") ?>
                                </td>
                            </tr>
                            <?php 
                                $build = $project->get_appartments()[0]; 
                                if ($project->get_building_type() != 1): 
                            ?>
                            <tr class="">
                                <td class="text-left pl-5">
                                    <b>Inclui Garagem</b>
                                </td>
                                
                                <td class="text-right pr-5">
                                    <?= (($build->get_has_garage()) ? "Sim" : "Não") ?>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="text-left pl-5">
                                    <b>Inclui Estacionamento</b>
                                </td>
                                
                                <td class="text-right pr-5">
                                    <?= (($build->get_has_parking()) ? "Sim" : "Não") ?>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="text-left pl-5">
                                    <b>Estado</b>
                                </td>
                                
                                <td class="text-right pr-5">
                                    <?= ProjectsManagement::state_id_to_string($project->get_state()) ?>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="text-left pl-5">
                                    <b>Área</b>
                                </td>
                                
                                <td class="text-right pr-5">
                                    <?= $build->get_area() ?> m<sup>2</sup>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="text-left pl-5">
                                    <b>Categoria Energética</b>
                                </td>
                                
                                <td class="text-right pr-5">
                                    <?= $build->get_energy_category() ?>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="text-left pl-5">
                                    <b>Tipologia</b>
                                </td>
                                
                                <td class="text-right pr-5">
                                    <?= $build->get_typology() ?>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="text-left pl-5">
                                    <b>Nº WCs</b>
                                </td>
                                
                                <td class="text-right pr-5">
                                    <?= $build->get_wc_count() ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
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
        let desc = document.getElementById("descrição");

        desc.innerHTML = marked.parse(desc.innerText);
    </script>

</body>

</html>