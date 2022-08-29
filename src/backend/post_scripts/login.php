<?php

    if (!isset($_POST[""]) || !isset($_POST[""]))
        header("Location: /admin/login");

    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();
    $app_instance->UserManagement->login("", "", "");

?>