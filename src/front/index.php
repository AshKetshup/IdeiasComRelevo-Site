<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();
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
        <div class="page-header clear-filter vh-100" filter-color="yellow">
            <div class="page-header-image" data-parallax="false">
                <div id="carouselLandingPage" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselLandingPage" data-slide-to="0"></li> <!-- PHP -->
                            <li data-target="#carouselLandingPage" data-slide-to="1" class="active"></li> <!-- PHP -->
                            <li data-target="#carouselLandingPage" data-slide-to="2"></li> <!-- PHP -->
                        </ol>
                        <div class="carousel-item">
                            <!-- .img-fluid. max-width: 100% -->
                            <img class="d-block img-fluid w-100"
                                src="https://images.unsplash.com/photo-1521574873411-508db8dbe55f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8"
                                alt="First slide"> <!-- PHP -->
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid w-100" src="/assets/img/exemplos/IMG_20220402_102058823.jpg" alt="Second slide">
                            <!-- PHP -->
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="/assets/img/Template/bg4.jpg" alt="Third slide"> <!-- PHP -->
                        </div>
                    </div>
                </div>
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