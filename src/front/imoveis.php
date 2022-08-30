<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();
    
    $projects = $app_instance->ProjectsManagement->admin_get_projects();
?>
<!DOCTYPE html>
<html lang="en">

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
                    <a data-toggle="collapse" data-parent="#searchAccordion" href="#filter" aria-expanded="false"
                        aria-controls="filter" class="btn btn-link col-1">
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
                                            <li><input type="checkbox" name="TipoVenda" value="0" class="m-1">Aluga-se</li>
                                            <li><input type="checkbox" name="TipoVenda" value="1" class="m-1">Vende-se</li>
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
        <?php foreach($projects as $project): ?>
            <div class="w-100 d-flex row mb-3 shop-item">
                <div class="col-3 image-head">
                    <img class="img-fluid m-1" src="https://fakeimg.pl/1000x750" alt="" srcset="">
                </div>
                <div class="col-9 body-content">
                    <div class="row">
                        <h4 class="col text-truncate text-left text m-1"><?= $project->get_title() ?></h4>
                    </div>
                    <div class="row">
                        <p class="col text-truncate text-left m-1"><?= ProjectsManagement::building_type_id_to_string($project->get_building_type()) ?> para $(Tipo de venda): <?= $project->get_zone() ?>, <?= $project->get_county() ?>, <?= $project->get_city() ?></p>
                    </div>
                    <ul class="row list-inline p-0">
                        <li class="col text-left text-muted m-1 h3">$(Tipologia)</li>
                        <li class="col text-left text-muted m-1 h3">$(Area m2)</li>
                        <li class="col text-left text-muted m-1 h3">$(Tipologia)</li>
                        <li class="col text-right m-1 h2">$(Preço)</li>
                    </ul>
                    <div class="row w-100 col-12 m-0 p-0">
                        <div class="icons col-3 m-2 p-1 d-flex justify-content-between align-content-center">
                            <i class="fas fa-2x fa-parking text-muted"></i>
                            <i class="fas fa-2x fa-warehouse text-muted"></i>
                            <i class="fas fa-2x fa-warehouse text-muted"></i>
                        </div>
                        <div class="col d-flex m-0 p-0 justify-content-end">
                            <a role="button" href="" class="btn btn-primary">Saber mais</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        
        <div class="w-100 d-flex row mb-3 shop-item">
            <div class="col-3 image-head">
                <img class="img-fluid m-1" src="https://fakeimg.pl/1000x750" alt="" srcset="">
            </div>
            <div class="col-9 body-content">
                <div class="row">
                    <h4 class="col text-truncate text-left text m-1">Terreno de 2.000 m2 junto ao Polo Universitário da Ajuda</h4>
                </div>
                <div class="row">
                    <p class="col text-truncate text-left m-1">$(Tipo) para $(Tipo de venda): $(localização)</p>
                </div>
                <ul class="row list-inline p-0">
                    <li class="col text-left text-muted m-1 h3">$(Tipologia)</li>
                    <li class="col text-left text-muted m-1 h3">$(Area m2)</li>
                    <li class="col text-left text-muted m-1 h3">$(Tipologia)</li>
                    <li class="col text-right m-1 h2">$(Preço)</li>
                </ul>
                <div class="row w-100 col-12 m-0 p-0">
                    <div class="icons col-3 m-2 p-1 d-flex justify-content-between align-content-center">
                        <i class="fas fa-2x fa-warehouse text-muted"></i>
                        <i class="fas fa-2x fa-warehouse text-muted"></i>
                        <i class="fas fa-2x fa-warehouse text-muted"></i>
                    </div>
                    <div class="col d-flex m-0 p-0 justify-content-end">
                        <a role="button" href="" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 d-flex row mb-3 shop-item">
            <div class="col-3 image-head">
                <img class="img-fluid m-1" src="https://fakeimg.pl/1000x750" alt="" srcset="">
            </div>
            <div class="col-9 body-content">
                <div class="row">
                    <h4 class="col text-truncate text-left text m-1">Terreno de 2.000 m2 junto ao Polo Universitário da Ajuda</h4>
                </div>
                <div class="row">
                    <p class="col text-truncate text-left m-1">$(Tipo) para $(Tipo de venda): $(localização)</p>
                </div>
                <ul class="row list-inline p-0">
                    <li class="col text-left text-muted m-1 h3">$(Tipologia)</li>
                    <li class="col text-left text-muted m-1 h3">$(Area m2)</li>
                    <li class="col text-left text-muted m-1 h3">$(Tipologia)</li>
                    <li class="col text-right m-1 h2">$(Preço)</li>
                </ul>
                <div class="row w-100 col-12 m-0 p-0">
                    <div class="icons col-3 m-2 p-1 d-flex justify-content-between align-content-center">
                        <i class="fas fa-2x fa-warehouse text-muted"></i>
                        <i class="fas fa-2x fa-warehouse text-muted"></i>
                        <i class="fas fa-2x fa-warehouse text-muted"></i>
                    </div>
                    <div class="col d-flex m-0 p-0 justify-content-end">
                        <a role="button" href="" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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