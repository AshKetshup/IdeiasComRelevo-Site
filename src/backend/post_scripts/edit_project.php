<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage post_scripts
     * 
     * Handles a post sent from the frontend to edit a project
     * Version: 1.0.1
     * 
     * @developer Pedro Cavaleiro
     * @created Aug 30, 2022
     * @lastedit Aug 31, 2022
     * 
     * @issues no issues linked to this file
     * @todo no tasks pending
     * 
     */

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
    $app_instance->ProjectsManagement->edit_project($data);        

    // just says that it's ok
    echo "OK";

?>