<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=., initial-scale=1.0">
    <title>Ideias com Relevo</title>
    <!-- <link rel="stylesheet" href="https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"> -->
    <!-- <link rel="canonical" href="https://webdevtrick.com/fancybox-product-slider/"> -->
    <link rel="stylesheet" href="css/style.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <nav>
        <a href="./index.html">
            <img class="mini-logo" src="./assets/img/Logotipo.png" style="height: 100%;">
        </a>
        <ul>
            <li>
                <a href="./imoveis.html">
                    <div class="navbar-selection">Imoveis</div>
                </a>
            </li>
            <li>
                <a href="./portefolio.html">
                    <div class="navbar-selection">Portefolio</div>
                </a>
            </li>
            <li>
                <a href="#footer">
                    <div class="navbar-selection">Contactos</div>
                </a>
            </li>
        </ul>
    </nav>
    <div class="search-grid">
        <div class="searchbar-wrapper">
            <form onsubmit="event.preventDefault();" role="search" class="aspect-container">
                <label for="search">Search for stuff</label>
                <input id="search" type="search" placeholder="Search..." autofocus required />
                <button type="submit">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </form>
        </div>
        <div class="filter-wrapper aspect-container">
            <!-- <input type="checkbox" class="open-drawer">
                <span class="checkmark">
                    <ion-icon name="add-outline"></ion-icon>
                </span>
            </input> -->
            <form onsubmit="event.preventDefault();" role="filter">
            
            </form>
        </div>
        <div class="shelf-wrapper">
            <div class="shelf">
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>    
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a><a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>
                <a href="" class="item" visible="true">
                    <div class="popup" title="Ultima unidade">!</div>
                    <div class="wrapper">
                        <img src="./assets/img/dummie/d-moradia.jpg" alt="">
                        <div class="details">
                            <h4>Moradia T4</h4>
                            <h5>Entroncamento - Casal do Grilo</h5>
                        </div>
                    </div>
                    <div class="content">
                        <div>
                            <div class="from" visible="true">
                                <p>A partir de</p>
                            </div>
                        </div>
                    </div>
                    <div class="show">
                        <p id="sell">Venda</p>
                        <p id="amount">200.000€</p>
                    </div>
                </a>

            </div>
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>
    <script src="./js/function.js"></script>
</body>
</html>