<?php

    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    var_dump($app_instance->ProjectsManagement->get_project_filters());

?>