<?php 
    require_once 'backend/entities/contacts.php';

    $office = ContactsEntity::fromType('office');
    $phone = ContactsEntity::fromType('phone');
    $email = ContactsEntity::fromType('email');
?>