<nav class="navbar navbar-expand-lg bg-primary fixed-top <?= $PAGE_ID == 'index' ? 'navbar-transparent' : '' ?>" <?= $PAGE_ID == 'index' ? 'color-on-scroll="200"' : '' ?>>
    <div class="container">
        <div class="navbar-translate m-0 p-0 col-3">
            <a class="navbar-brand w-100 h-100" href="index" rel="tooltip" data-placement="bottom">
                <!-- Ideias Com Relevo -->
                <img src="/assets/img/Brand/white_logotype.png" alt="logo_brand">
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
            data-nav-image="/assets/img/blurred-image-1.jpg">
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