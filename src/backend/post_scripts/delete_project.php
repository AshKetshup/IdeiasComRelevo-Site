<?php

    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    if (!isset($_GET['id'])) {
        header("Location: /admin/projetos?err=true");
    }

    $app_instance->ProjectsManagement->delete_project($_GET['id']);

    header("Location: /admin/projetos?err=false");

?>