<?php

    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    $json = file_get_contents('php://input');
    $data = json_decode($json);
    
    $app_instance->ProjectsManagement->create_project($data);

    echo "OK";

?>