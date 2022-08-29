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
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="200">
        <div class="container">
            <div class="navbar-translate m-0 p-0 col-3">
                <a class="navbar-brand w-100 h-100" href="index" rel="tooltip" data-placement="bottom">
                    <!-- Ideias Com Relevo -->
                    <img src="./assets/img/Brand/SVG/Typo_Title_white.svg" alt="logo_brand">
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar top-bar"></span>
                    <span class="navbar-toggler-bar middle-bar"></span>
                    <span class="navbar-toggler-bar bottom-bar"></span>
                </button>
            </div>
            <div class="col-9 collapse navbar-collapse justify-content-end p-0" id="navigation"
                data-nav-image="./assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="imoveis">
                            <i class="now-ui-icons design_app"></i>
                            <p>Imóveis</p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="portfolio" class="nav-link">
                            <i class="now-ui-icons design_app"></i>
                            <p>Portfolio</p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#footer" class="nav-link">
                            <i class="now-ui-icons design_app"></i>
                            <p>Contactos</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
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
                            <img class="d-block img-fluid w-100" src="./assets/img/exemplos/IMG_20220402_102058823.jpg" alt="Second slide">
                            <!-- PHP -->
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="./assets/img/Template/bg4.jpg" alt="Third slide"> <!-- PHP -->
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
                        <div class="w-100"><img class="n-logo" src="./assets/img/Brand/SVG/Logo.svg" alt="Ideias Com Relevo Logo"></div>
                        <div class="w-100"><img class="w-75 h1" src="assets/img/Brand/SVG/Typo_white.svg" alt=""></div>
                        <h3>Compramos o passado, vendemos o futuro</h3>
                    </div>
                    <a class="carousel-control-next" href="#carouselLandingPage" role="button" data-slide="next">
                        <i class="now-ui-icons arrows-1_minimal-right"></i>
                    </a>
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
        <footer class="footer" id="footer" data-background-color="black">
            <div class="container py-5">
                <div class="row">
                    <div class="col-3">
                        <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none"
                            href="index.html">
                            <span class="h5 m-0">Ideias com Relevo</span>
                        </a>
                        <ul class="list-unstyled small text-muted">
                            <li class="mb-2"></li>
                            <!-- <li class="mb-2">Code licensed <a href="https://github.com/AshKetshup/Correio-Privado/blob/TheMainTimeline/LICENSE" target="_blank" rel="license noopener">GPL-3.0</a>.</li> -->
                        </ul>
                    </div>
                    <div class="col-2">
                        <h5>Navigation</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2 w-100"><a href="index.html">Home</a></li>
                            <li class="mb-2 w-100"><a href="#">Filter News</a></li>
                            <li class="mb-2 w-100"><a href="#">Recent News</a></li>
                            <li class="mb-2 w-100"><a href="about-us.html">About Us</a></li>
                        </ul>
                    </div>
                    <div class="col-7">
                        <h5>Associados</h5>
                        <div class="d-flex flex-wrap">

                        </div>
                    </div>
                </div>
                <div class="pt-5 row w-100 small ">
                    <p class="col-12 text-center text-muted">Designed and built by <a
                            class="p-1 link-dark text-decoration-none" href="index.html#devs">Diogo Simões</a> and <a
                            class="p-1 link-dark text-decoration-none" href="index.html#devs">Pedro Cavaleiro</a></p>
                </div>
            </div>
        </footer>
    </div>
    
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