<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    $carousselImages = $app_instance->FinishesManagement->admin_get_finishes(FinishesManagement::catshort_to_id("I"));
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
        $PAGE_ID = "index";
        include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/nav.php';
    ?>

    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header clear-filter vh-100" filter-color="primary">
            <div class="page-header-image" data-parallax="false">
                <div id="carouselLandingPage" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                    <?php for ($i = 0; $i < count($carousselImages); $i++): ?>
                        <?php $image = $carousselImages[$i]; ?>
                        <?php if ($i == 0): ?>
                            <div class="carousel-item active">
                        <?php else: ?>
                            <div class="carousel-item">
                        <?php endif; ?>
                            <img class="d-inline w-100" src="/uploads/<?= $image->get_image() ?>">
                        </div>
                    <?php endfor; ?>
                    </div>
                </div>
                <style>
                    .carousel-item > img {
                        object-fit: cover;
                        vertical-align: middle;
                        height: 100vh;
                        min-width: 100vw;

                    }
                </style>
            </div>
            <div class="container-fluid w-100">
                <div class="d-flex align-content-between justify-content-between">
                    <a class="carousel-control-prev" href="#carouselLandingPage" role="button" data-slide="prev">
                        <i class="now-ui-icons arrows-1_minimal-left"></i>
                    </a>
                    <div class="content-center brand justify-content-center d-flex flex-column w-100">
                        <div class="w-100"><img class="n-logo" src="/assets/img/Brand/SVG/Logo.svg" alt="Ideias Com Relevo Logo"></div>
                        <div class="w-100"><img class="w-75 h1" src="/assets/img/Brand/SVG/Typo_white.svg" alt=""></div>
                        <h3>Compramos o passado, vendemos o futuro</h3>
                    </div>
                    <a class="carousel-control-next" href="#carouselLandingPage" role="button" data-slide="next">
                        <i class="now-ui-icons arrows-1_minimal-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- footer -->
        <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/footer.php'; ?>
        
        <!-- scripts -->
        <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/scripts.php'; ?>
        
    </div>    
</body>

</html>