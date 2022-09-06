<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
$app_instance = new IdeiasComRelevo();

$projects = $app_instance->ProjectsManagement->admin_get_projects();
?>
<!DOCTYPE html>
<html lang="pt">

<?php include_once '../includes/site/head.php'; ?>

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
    $PAGE_ID = "imoveis";
    include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/nav.php';
    ?>

    <!-- End Navbar -->
    <hr class="container" style="margin-top: 90px;">
    <div class="container d-flex justify-content-start">
        <form id="searchAccordion" class="w-100 card-collapse pb-0" aria-multiselectable="true" action="imoveis.php" method="post">
            <div class="card card-plain shadow-lg bg-primary" style="margin-top: 30px;">
                <div class="card-header w-100 d-flex flex-row bg-white" role="tab" id="headingOne">
                    <button type="submit" class="btn btn-link col-1"><i class="fas fa-2x fa-search"></i></button>
                    <input type="text" name="searchField" class="col-10 form-text border-0" id="searchContent">
                    <a data-toggle="collapse" data-parent="#searchAccordion" href="#filter" aria-expanded="false" aria-controls="filter" class="btn btn-link col-1">
                        <i class="fas fa-2x fa-filter"></i>
                    </a>
                </div>
                <div id="filter" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-body m-2 mx-4 text-white">
                        <h4 class="m-0 mb-4">Filtro Avançado</h4>
                        <div class="row text-black d-flex">
                            <div class="col-4">
                                <div class="card bg-white shadow p-2 form-control">
                                    <fieldset class="d-flex m-1">
                                        <ul class="list-unstyled m-0">
                                            <legend for="vendaInput" class="" style="font-size: 1rem;">Tipo de Venda</legend>
                                            <li><input type="checkbox" name="TipoVenda[]" value="0" class="m-1">Aluga-se</li>
                                            <li><input type="checkbox" name="TipoVenda[]" value="1" class="m-1">Vende-se</li>
                                        </ul>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card bg-white shadow p-2">asd</div>
                            </div>
                            <div class="col-4">
                                <div class="card bg-white shadow p-2">asd</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr class="container">
    <div class="container d-flex align-items-start flex-column">
        <h3>Resultados para ""</h3>
        <?php foreach ($projects as $project) : ?>
            <?php $project->reload_appartments(); ?>
            <div class="col-12 d-flex m-0 my-2 p-0 shopItem overflow-hidden card flex-row align-items-center" href="/produto?id=<?= $project->get_id() ?>" style="height: 200px; cursor: pointer;">
                <div class="col-3 m-0 p-0 overflow-hidden">
                    <img class="" style="min-width: 100%; height: 200px; vertical-align: middle; object-fit: cover;" src="/uploads/<?= $project->get_main_photo() ?>" 
                        alt="<?= $project->get_title() ?>" srcset="">
                </div>
                <div class="col-9 m-0 px-3 py-0 h-100 d-flex flex-column">
                    <h4 class="col-12 m-0 p-0">
                        <?= $project->get_title() ?>
                    </h4>
                    <p class="col-12 m-0 p-0 text-truncate text-left">

                        <?php if ($project->get_building_type() == 1): ?>
                            <?= ProjectsManagement::state_id_to_string($project->get_sale_type()) ?>
                        <?php else: ?>
                            <?= ProjectsManagement::state_id_to_string($project->get_state()) ?>
                        <?php endif; ?> <?= ProjectsManagement::building_type_id_to_string($project->get_building_type()) ?>: <?= 
                        $project->get_zone() ?>, <?= $project->get_county() ?>, <?= $project->get_city() ?>
                    
                    </p>
                    <div class="col-12 my-1 m-0 p-0 d-flex justify-content-between">
                        <div class="col-8 m-0 p-0">
                            <ul class="col-12 list-unstyled my-1 m-0 p-0 text-muted text-left" style="gap: 1rem">
                                <li class="p">
                                    Área: <b><?php
                                        if ($project->get_building_type() == 1) {
                                            $minArea = min(
                                                array_map(function($x) { return $x->get_area(); }, $project->get_appartments())
                                            );

                                            echo "A partir de " . $minArea;
                                        } else {
                                            echo $minArea;
                                        }
                                    ?> m<sup>2</sup></b>
                                </li>
                                <?php if ($project->get_building_type() != 1): ?>
                                <li class="p">
                                    Tipologia: <b><?= $project->get_appartments()[0]->get_typology() ?></b>
                                </li>
                                <?php endif; ?>
                                <?php if ($project->get_building_type() != 1): ?>
                                <li class="p">
                                    Categoria Energética: <b><?php 
                                        echo $project->get_appartments()[0]->get_energy_category();
                                    ?></b>
                                </li>
                                <?php endif; ?>

                                <li class="p">
                                    Pisos: <b><?php echo $project->get_floor_count(); ?></b>
                                </li>
                                <?php
                                    $has_garage   = false;
                                    $has_parking  = false;
                                    $has_elevator = $project->get_has_elevator();
                                    foreach ($project->get_appartments() as $appart) {
                                        $has_garage += $appart->get_has_garage();
                                        $has_parking += $appart->get_has_parking();
                                    }
                                ?>

                                <?php if ($has_garage || $has_parking || $has_elevator): ?>
                                    <li class="col-12 m-0 p-0 text_caps-small">Inclui: <b><?php if ($has_parking): ?> Estacionamento<?php endif; ?><?php if ($has_garage) : ?> Garagem<?php endif; ?><?php if ($has_elevator) : ?> Elevador<?php endif; ?>
                                    </b></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="col-4 m-0 p-0 text-right">
                        
                        <?php $value = $project->get_value();?>
                        <?php if ($project->get_building_type() == 1): ?>
                            <p class="col-12 m-0 p-0">A partir de:</p>
                            <h3 class="col-12 m-0 p-0">
                            
                            <?php if (isset($value["rent"])): ?>
                                <?= $value["rent"] ?>€/mês
                            <?php endif; ?>
                            <?php if (isset($value["sell"])): ?>
                                <br>
                                <?= $value["sell"] ?>€
                            <?php endif; ?>
                            
                            </h3>
                        <?php else: ?>
                            <h3 class="col-12 m-0 p-0">
                                <?php if ($project->get_state() == 1): ?>
                                    <?= $value ?>€
                                <?php else: ?> 
                                    <?php if ($project->get_state() == 2): ?>
                                        <?= $value ?>€/mês
                                    <?php else: ?>
                                        <?= "" ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </h3>
                        <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        for (const item of document.getElementsByClassName("shopItem")) {
            item.addEventListener("click", () => {
                location.assign(item.getAttribute("href"));
            });
        }
    </script>
    <!-- footer -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/footer.php'; ?>

    <!-- scripts -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/scripts.php'; ?>
</body>

</html>