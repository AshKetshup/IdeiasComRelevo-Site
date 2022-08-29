<?php 
    require_once 'backend/entities/contacts.php';

    $office = ContactsEntity::fromType('office');
    $phone = ContactsEntity::fromType('phone');
    $email = ContactsEntity::fromType('email');
?>

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