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
            <div class="col-12 d-flex m-0 my-2 p-0 shopItem" href="/produto?id=<?= $project->get_id() ?>" style="max-height: 200px; height: 200px; cursor: pointer;">
                <div class="col-3 m-0 pl-0 overflow-hidden">
                    <img class="" style="min-width: 100%; height: 100%; vertical-align: middle; object-fit: cover;" src="/uploads/<?= $project->get_main_photo() ?>" 
                        alt="<?= $project->get_title() ?>" srcset="">
                </div>
                <div class="col-9 m-0 pr-0 py-0 h-100 d-flex flex-column">
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
                    <ul class="col-12 list-unstyled my-1 m-0 p-0 text-muted text-left" style="gap: 1rem">
                        <li class="p">
                            Área: <b><?php 
                                if ($project->get_building_type() == 1) {
                                    echo "N/A";
                                } else {
                                    echo $project->get_appartments()[0]->get_area();
                                }
                            ?> m<sup>2</sup></b>
                        </li>
                        <li class="p">
                            Tipologia: <b><?php 
                                if ($project->get_building_type() == 1) {   
                                    echo "N/A";
                                } else {
                                    echo $project->get_appartments()[0]->get_typology();
                                } 
                            ?></b>
                        </li>
                        <li class="p">
                            Categoria Energética: <b><?php 
                                echo $project->get_appartments()[0]->get_energy_category();
                            ?></b>
                        </li>
                        <li class="p">
                            Pisos: <b><?php 
                                echo $project->get_floor_count();
                            ?></b>
                        </li>
                    </ul>
                    <div class="col-12 my-1 m-0 p-0 d-flex align-items-end h-100 align-self-end justify-content-between">
                        <div class="col-3 m-0 p-0 d-flex align-items-end" style="gap: 5px;">

                        <?php if ($project->get_building_type() != 1 && $project->get_appartments()[0]->get_has_parking()) : ?>
                            <i class="fas fa-2x fa-parking text-muted" title="Inclui Estacionamento"></i>
                        <?php endif; ?>
                            <?php if ($project->get_appartments()[0]->get_has_garage()) : ?>
                            <i class="fas fa-2x fa-warehouse text-muted" title="Inclui Garagem"></i>
                        <?php endif; ?>
                        <?php if ($project->get_has_elevator()) : ?>
                            <i class="fas fa-2x fa-elevator text-muted" title="Inclui Elevador"></i>
                        <?php endif; ?>

                        </div>
                        <h3 class="col-4 text-right m-0 p-0">
                            <?= $project->get_value() ?>€<?php if($project->get_state() == 2): ?>/mês<?php endif; ?>
                        </h3>
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
    <!-- Sart Modal -->
    <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <h4 class="title title-up">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the
                            Semantics, a large language ocean. A small river named Duden flows by their place and
                            supplies it with the necessary regelialia. It is a paradisematic country, in which roasted
                            parts of sentences fly into your mouth.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default">Nice Button</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> -->
    <!--  End Modal -->
    <!-- Mini Modal -->
    <!-- <div class="modal fade modal-mini modal-primary" id="myModal1" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <div class="modal-profile">
                            <i class="now-ui-icons users_circle-08"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p>Always have an access to your profile</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-neutral">Back</button>
                        <button type="button" class="btn btn-link btn-neutral" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> -->
    <!--  End Modal -->

    <!-- footer -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/footer.php'; ?>

    <!-- scripts -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/scripts.php'; ?>

    <!-- <script>
        $(document).ready(function () {
            // the body of this function is in assets/js/now-ui-kit.js
            nowuiKit.initSliders();
        });

        function scrollToDownload() {

            if ($('.section-download').length != 0) {
                $("html, body").animate({
                    scrollTop: $('.section-download').offset().top
                }, 1000);
            }
        }
    </script> -->
</body>

</html>