<?php 
    require_once 'backend/entities/contacts.php';

    $office = ContactsEntity::fromType('office');
    $phone = ContactsEntity::fromType('phone');
    $email = ContactsEntity::fromType('email');
?>

<div id="footer">
    <div class="row">
        <div id="contacts" class="col">
            <h3>Contacte-nos</h3>
            
            <h4>Escritorio</h4>
            <p><?php echo $office->get_value(); ?></p>

            <br>
            
            <h4>Email</h4>
            <a href="mailto:<?php echo $office->get_value(); ?>?subject=Mail from Our Site">
                <p class="email-id"><?php echo $email->get_value(); ?></p>
            </a>

            <br>
            
            <h4>Telefone</h4>
            <p class="phone-id"><?php echo $phone->get_value(); ?></p>
        </div>
        <div id="links" class="col">
            <h3>Links</h3>
            <ul>
                <li><a href="index.html"><p>Home</p></a></li>
                <li><a href="index.html"><p>Imoveis</p></a></li>
                <li><a href="index.html"><p>Portefolio</p></a></li>
                <li><a href="index.html"><p>Contactos</p></a></li>
            </ul>
        </div>
        <div id="associates" class="col">
            <h3>Associados</h3>
            <div class="associates-content">
                <img src="" alt="" />
                <img src="" alt="" />
                <img src="" alt="" />
                <img src="" alt="" />
                <img src="" alt="" />
                <img src="" alt="" />
            </div>
        </div>
    </div>
</div>