<?php

    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();
    /* Name, Email, Password */
    $app_instance->UserManagement->create_user("Super Admin", "root@server.com", "root");

?>