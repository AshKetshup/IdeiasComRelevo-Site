<?php

    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    if (!isset($_POST["telemovel"]) || !isset($_POST["email"]) || !isset($_POST["sede"]))
        header("Location: /admin/contactos?err=true");

    $app_instance->ContactsManagement->update_contacts($_POST["telemovel"], $_POST["email"], $_POST["sede"]);
    header("Location: /admin/contactos?err=false");

?>