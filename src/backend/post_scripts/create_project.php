<?php

    // only to prevent the page from reloading
    // http_response_code(404);

    // starts the app
    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    // reads the raw json
    $json = file_get_contents('php://input');
    // decodes the json to a PHP object
    $data = json_decode($json);
    // creates the project
    $app_instance->ProjectsManagement->create_project($data);        

    // just says that it's ok
    echo "OK";

?>