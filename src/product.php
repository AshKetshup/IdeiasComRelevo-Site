<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (!isset($_GET['id']))
        header("location: /");

    require_once 'backend/entities/realestate.php';

    $id = $_GET['id'];    
    $product = RealEstateEntity::fromId($id);
    var_dump($product);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=., initial-scale=1.0">
    <title>Ideias com Relevo</title>
    <link rel="stylesheet" href="https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <link rel="canonical" href="https://webdevtrick.com/fancybox-product-slider/">
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
    <div id="main">
        <div id="highlight" class="columns">
            <!-- Slider + Tabela com detalhes -->
            <div class="column">
                <div class="demo slider">
                    <ul id="lightSlider">                        
                        <?php foreach($product->get_photos() as $photo): ?>
                            <li data-thumb="<?= $photo ?>">
                                <a href="<?= $photo ?>" data-fancybox="gallery">
                                    <img src="<?= $photo ?>" />
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="table column columns">
                <!-- Nome + Preço -->
                <div id="title" class="container aspect-container">
                    <h1 class="name">Predio Habitacional</h1>
                    <h2 class="amount accent-color">9999999€</h2>
                </div>
                <!-- table -->
                <table class="local aspect-container">
                    <tr>
                        <th>Zona</th>
                        <td>Centro</td>
                    </tr>
                    <tr>
                        <th>Concelho</th>
                        <td>Ourém</td>
                    </tr>
                    <tr>
                        <th>Freguesia</th>
                        <td>Vilar</td>
                    </tr>
                    <tr>
                        <th>Elevador</th>
                        <td>Sim</td>
                    </tr>
                    <tr>
                        <th>Nº Apartamentos</th>
                        <td>12</td>                        
                    </tr>
                    <tr>
                        <th>Pisos</th>
                        <td>Garagem<br>Res-do-Chão<br>1º Andar<br>2º Andar</td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="description">
            <h2>Descrição:</h2>
            <!-- Descrição -->
            <p class="container aspect-container">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum magnam dolores delectus nemo. Asperiores enim quibusdam cupiditate officiis, recusandae consequuntur est soluta eum id qui nobis. Doloribus saepe ipsam rerum aut.</p>
        </div>
        <div id="availability">
            <h2>Disponibilidade:</h2>
            <!-- Dropdown dos andares -->
            <div class="container">
                <div class="accordion">
                    <div class="accordion-item aspect-container" id="question1">
                        <a class="accordion-link" href="#question1">
                            <ion-icon data="forward" name="arrow-forward-outline"></ion-icon>
                            <ion-icon data="down" name="arrow-down-outline"></ion-icon>
                            Garagem
                        </a>
                        <div class="answer">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, dolorum non aliquam excepturi doloribus delectus saepe veniam nesciunt corrupti illo minus, odit officia consequuntur placeat perspiciatis iusto quaerat aperiam. Blanditiis molestiae repellendus delectus fugiat numquam, animi voluptates aut nulla temporibus fuga enim nam, maiores assumenda facilis doloribus at quae ipsum exercitationem eos recusandae ullam aliquid dolorum? Nesciunt eum molestiae labore ullam dignissimos iusto perspiciatis quia tempore voluptates asperiores neque, velit mollitia voluptatem atque totam illum incidunt iste unde libero deserunt vitae earum! Error, labore ipsa ullam officia sapiente dolore! Dolorum architecto dicta, magni dolor mollitia quidem odit sunt et dolores? Quia earum eos accusamus totam ex ducimus similique in iusto? Exercitationem, quos, autem molestias nam quibusdam ex odio pariatur et minima sint distinctio, soluta perspiciatis debitis porro sed ab beatae hic tempora dolores molestiae. Eveniet optio, vel praesentium id consectetur ea laboriosam quo. Perferendis, excepturi possimus tenetur nihil consectetur velit ab esse error suscipit quidem quae a? Illum perspiciatis quis ullam assumenda soluta rem similique culpa, reiciendis et omnis. Excepturi, accusamus velit. Nostrum tempore sapiente consequatur, repellat nobis, aspernatur minus voluptas magnam dicta eaque est numquam molestiae distinctio ab fugiat debitis velit sunt ratione. Hic accusamus rerum rem earum mollitia.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item aspect-container" id="question2">
                        <a class="accordion-link" href="#question2">
                            <ion-icon data="forward" name="arrow-forward-outline"></ion-icon>
                            <ion-icon data="down" name="arrow-down-outline"></ion-icon>
                            Res-do-Chão
                        </a>
                        <div class="answer">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, dolorum non aliquam excepturi doloribus delectus saepe veniam nesciunt corrupti illo minus, odit officia consequuntur placeat perspiciatis iusto quaerat aperiam. Blanditiis molestiae repellendus delectus fugiat numquam, animi voluptates aut nulla temporibus fuga enim nam, maiores assumenda facilis doloribus at quae ipsum exercitationem eos recusandae ullam aliquid dolorum? Nesciunt eum molestiae labore ullam dignissimos iusto perspiciatis quia tempore voluptates asperiores neque, velit mollitia voluptatem atque totam illum incidunt iste unde libero deserunt vitae earum! Error, labore ipsa ullam officia sapiente dolore! Dolorum architecto dicta, magni dolor mollitia quidem odit sunt et dolores? Quia earum eos accusamus totam ex ducimus similique in iusto? Exercitationem, quos, autem molestias nam quibusdam ex odio pariatur et minima sint distinctio, soluta perspiciatis debitis porro sed ab beatae hic tempora dolores molestiae. Eveniet optio, vel praesentium id consectetur ea laboriosam quo. Perferendis, excepturi possimus tenetur nihil consectetur velit ab esse error suscipit quidem quae a? Illum perspiciatis quis ullam assumenda soluta rem similique culpa, reiciendis et omnis. Excepturi, accusamus velit. Nostrum tempore sapiente consequatur, repellat nobis, aspernatur minus voluptas magnam dicta eaque est numquam molestiae distinctio ab fugiat debitis velit sunt ratione. Hic accusamus rerum rem earum mollitia.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item aspect-container" id="question3">
                        <a class="accordion-link" href="#question3">
                            <ion-icon data="forward" name="arrow-forward-outline"></ion-icon>
                            <ion-icon data="down" name="arrow-down-outline"></ion-icon>
                            1º Andar
                        </a>
                        <div class="answer">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, dolorum non aliquam excepturi doloribus delectus saepe veniam nesciunt corrupti illo minus, odit officia consequuntur placeat perspiciatis iusto quaerat aperiam. Blanditiis molestiae repellendus delectus fugiat numquam, animi voluptates aut nulla temporibus fuga enim nam, maiores assumenda facilis doloribus at quae ipsum exercitationem eos recusandae ullam aliquid dolorum? Nesciunt eum molestiae labore ullam dignissimos iusto perspiciatis quia tempore voluptates asperiores neque, velit mollitia voluptatem atque totam illum incidunt iste unde libero deserunt vitae earum! Error, labore ipsa ullam officia sapiente dolore! Dolorum architecto dicta, magni dolor mollitia quidem odit sunt et dolores? Quia earum eos accusamus totam ex ducimus similique in iusto? Exercitationem, quos, autem molestias nam quibusdam ex odio pariatur et minima sint distinctio, soluta perspiciatis debitis porro sed ab beatae hic tempora dolores molestiae. Eveniet optio, vel praesentium id consectetur ea laboriosam quo. Perferendis, excepturi possimus tenetur nihil consectetur velit ab esse error suscipit quidem quae a? Illum perspiciatis quis ullam assumenda soluta rem similique culpa, reiciendis et omnis. Excepturi, accusamus velit. Nostrum tempore sapiente consequatur, repellat nobis, aspernatur minus voluptas magnam dicta eaque est numquam molestiae distinctio ab fugiat debitis velit sunt ratione. Hic accusamus rerum rem earum mollitia.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item aspect-container" id="question4">
                        <a class="accordion-link" href="#question4">
                            <ion-icon data="forward" name="arrow-forward-outline"></ion-icon>
                            <ion-icon data="down" name="arrow-down-outline"></ion-icon>
                            2º Andar
                        </a>
                        <div class="answer">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, dolorum non aliquam excepturi doloribus delectus saepe veniam nesciunt corrupti illo minus, odit officia consequuntur placeat perspiciatis iusto quaerat aperiam. Blanditiis molestiae repellendus delectus fugiat numquam, animi voluptates aut nulla temporibus fuga enim nam, maiores assumenda facilis doloribus at quae ipsum exercitationem eos recusandae ullam aliquid dolorum? Nesciunt eum molestiae labore ullam dignissimos iusto perspiciatis quia tempore voluptates asperiores neque, velit mollitia voluptatem atque totam illum incidunt iste unde libero deserunt vitae earum! Error, labore ipsa ullam officia sapiente dolore! Dolorum architecto dicta, magni dolor mollitia quidem odit sunt et dolores? Quia earum eos accusamus totam ex ducimus similique in iusto? Exercitationem, quos, autem molestias nam quibusdam ex odio pariatur et minima sint distinctio, soluta perspiciatis debitis porro sed ab beatae hic tempora dolores molestiae. Eveniet optio, vel praesentium id consectetur ea laboriosam quo. Perferendis, excepturi possimus tenetur nihil consectetur velit ab esse error suscipit quidem quae a? Illum perspiciatis quis ullam assumenda soluta rem similique culpa, reiciendis et omnis. Excepturi, accusamus velit. Nostrum tempore sapiente consequatur, repellat nobis, aspernatur minus voluptas magnam dicta eaque est numquam molestiae distinctio ab fugiat debitis velit sunt ratione. Hic accusamus rerum rem earum mollitia.
                            </p>
                        </div>
                    </div>
                </div>
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