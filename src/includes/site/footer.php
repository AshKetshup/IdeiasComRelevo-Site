<?php
    $contacts = $app_instance->ContactsManagement->get_contacts();
    $associates = $app_instance->AssociateManagement->admin_get_associates();
?>
<footer class="footer" id="footer" data-background-color="black">
    <div class="container py-5">
        <div class="row">
            <div class="col-3">
                <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="index.html">
                    <span class="h5 m-0">Ideias com Relevo</span>
                </a>
                <ul class="m-0 ml-3 list-unstyled text-muted d-flex flex-column">
                    <li class="mb-2 row w-100 d-flex" id="phone">
                        <div class="col-1 p-0">
                            <i class="fas fa-phone"></i> 
                        </div>
                        <div class="col-11 p-0 ">
                            <?= $contacts["phone"] ?>
                        </div>
                    </li>
                    <li class="mb-2 row w-100 d-flex" id="email">
                        <div class="col-1 p-0">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="col-11 p-0">
                            <?= $contacts["email"] ?>
                        </div>
                    </li>
                    <li class="mb-2 row w-100 d-flex" id="office">
                        <div class="col-1 p-0">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="col-11 p-0"><?= str_replace("\n", "<br />", $contacts["office"]) ?></div>
                    </li>
                </ul>
            </div>
            <div class="col-2">
                <h5>Navigation</h5>
                <ul class="list-unstyled">
                    <li class="mb-2 w-100"><a href="/">Home</a></li>
                    <li class="mb-2 w-100"><a href="/imoveis">Imoveis</a></li>
                    <li class="mb-2 w-100"><a href="/portfolio">Portfolio</a></li>
                    <li class="mb-2 w-100"><a href="#footer">Contactos</a></li>
                </ul>
            </div>
            <div class="col-7">
                <h5>Associados</h5>
                    <ul class="image-gallery">
                        <?php foreach($associates as $associate): ?>
                            <li>
                                <a target="_blank" href="<?= (str_contains($associate->get_website(), "http") ? $associate->get_website() : "http://" . $associate->get_website()) ?>"><img src="/uploads/<?= $associate->get_logo() ?>" alt="<?= ($associate->get_name()) ?>"></a>
                            </li>    
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <style>
                ul {
                    list-style: none;
                }

                /* Responsive image gallery rules begin*/
                .image-gallery {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;

                    max-height: 150px;
                    overflow-y: auto;
                    overflow-x: hidden;
                }

                .image-gallery > li {
                    flex: 1 1 auto; /* or flex: auto; */
                    height: 100px;
                    position: relative;
                }

                .image-gallery::after {
                    content: "";
                    flex-grow: 999;
                }

                .image-gallery li img {
                    object-fit: fill;
                    width: 100%;
                    height: 100%;
                    vertical-align: middle;
                    border-radius: 5px;
                }
            </style>
        </div>
        <div class="pt-5 row w-100 small ">
            <p class="col-12 text-center text-muted">Designed and built by <a class="p-1 link-dark text-decoration-none" href="index.html#devs">Diogo Simões</a> and <a class="p-1 link-dark text-decoration-none" href="index.html#devs">Pedro Cavaleiro</a></p>
        </div>
    </div>
</footer>