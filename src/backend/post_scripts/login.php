<?php

    // checks if all fields contain data
    if (!isset($_POST["email"]) || !isset($_POST["password"]))
        header("Location: /admin/login");

    // starts the app
    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    // attempts to login
    $result = $app_instance->UserManagement->login($_POST["email"], $_POST["password"]);

    // if the user was logged in redirects to /admin/index otherwise redirects to login
    if ($result)
        header("Location: /admin/index");
    else
        header("Location: /admin/login");

?>