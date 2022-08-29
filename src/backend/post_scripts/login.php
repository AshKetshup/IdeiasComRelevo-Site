<?php

    if (!isset($_POST["email"]) || !isset($_POST["password"]))
        header("Location: /admin/login");

    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();
    $result = $app_instance->UserManagement->login($_POST["email"], $_POST["password"]);

    if ($result)
        header("Location: /admin/index");
    else
        header("Location: /admin/login");

?>