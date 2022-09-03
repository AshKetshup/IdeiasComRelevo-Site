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
                <?php for ($i=0; $i < count($project->get_photos()); $i++) { 
                    if ($i == 0) {
                        echo '<li data-target="#carousel-product" data-slide-to="'.$i.'" class="active"></li>';
                        continue;
                    }

                    echo '<li data-target="#carousel-product" data-slide-to="'.$i.'"></li>';
                } ?>
            </ol>
            <div class="carousel-inner" style="height: 500px" role="listbox">
                <?php 
                    $x = 0;
                    foreach ($project->get_photos() as $photo) {
                        
                        echo (
                            ($x == 0) 
                                ? '<div class="carousel-item active">'
                                : '<div class="carousel-item">'
                        ).'<img class="d-block" src="/uploads/'.$photo.'"></div>';
                    
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
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#descrição" role="tab" aria-controls="descrição"
                    aria-selected="true">Descrição</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pisos-tab" data-toggle="tab" href="#pisos" role="tab"
                    aria-controls="pisos" aria-selected="false">Pisos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab"
                    aria-controls="info" aria-selected="false">Informação</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="descrição" role="tabpanel" aria-labelledby="descrição-tab" style="height: 50vh;">
                <?= $project->get_description() ?>
            </div>
            <div class="tab-pane" id="pisos" role="tabpanel" aria-labelledby="pisos-tab" style="height: 50vh;">....</div>
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