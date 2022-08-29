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
    <nav class="navbar navbar-expand-lg bg-primary fixed-top">
        <div class="container">
            <div class="navbar-translate m-0 p-0 col-3">
                <a class="navbar-brand w-100 h-100" href="index" rel="tooltip" data-placement="bottom">
                    <!-- Ideias Com Relevo -->
                    <img src="./assets/img/Brand/white_logotype.png" alt="logo_brand">
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar top-bar"></span>
                    <span class="navbar-toggler-bar middle-bar"></span>
                    <span class="navbar-toggler-bar bottom-bar"></span>
                </button>
            </div>
            <div class="col-9 collapse navbar-collapse justify-content-end m-0 p-0" id="navigation"
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
    <div class="container vh-100 d-flex justify-content-start align-items-center">
        <form id="searchAccordion" class="w-100 card-collapse" aria-multiselectable="true" action="">
            <div class="card card-plain shadow bg-primary">
                <div class="card-header w-100 d-flex flex-row bg-white" role="tab" id="headingOne">
                    <button type="submit" class="btn btn-link col-1"><i class="fas fa-2x fa-search"></i></button>
                    <input type="text" class="col-10 form-text border-0" id="searchContent">
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
    <footer class="footer" id="footer" data-background-color="black">
        <div class="container py-5">
            <div class="row">
                <div class="col-3">
                    <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="index.html">
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
    
    <!-- footer -->
    <?php include_once '../includes/site/footer.php'; ?>
    
    <!-- scripts -->
    <?php include_once '../includes/site/scripts.php'; ?>

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