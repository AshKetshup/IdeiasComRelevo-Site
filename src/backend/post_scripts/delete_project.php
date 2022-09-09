<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage post_scripts
     * 
     * Handles a post sent from the frontend to delete a project
     * Version: 1.0.0
     * 
     * @developer Pedro Cavaleiro
     * @created Aug 30, 2022
     * @lastedit Aug 30, 2022
     * 
     * @issues no issues linked to this file
     * @todo no tasks pending
     * 
     */

    // starts the app
    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    // if no id is set returns to projetos setting err as true
    if (!isset($_GET['id'])) {
        header("Location: /admin/projetos?err=true");
    }

    // deletes the project
    $app_instance->ProjectsManagement->delete_project($_GET['id']);

    // redirects to projetos setting err as false
    header("Location: /admin/projetos?err=false");

?>