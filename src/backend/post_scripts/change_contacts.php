<?php

    // starts the app
    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    // verifies if all fields contain data if not redirects to the same page setting the err to true
    if (!isset($_POST["telemovel"]) || !isset($_POST["email"]) || !isset($_POST["sede"]))
        header("Location: /admin/contactos?err=true");

    // updates the contacts and redirects to the same page setting the err to false
    $app_instance->ContactsManagement->update_contacts($_POST["telemovel"], $_POST["email"], $_POST["sede"]);
    header("Location: /admin/contactos?err=false");

?>