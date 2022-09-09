<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage post_scripts
     * 
     * Handles a post sent from the frontend to create a project
     * Version: 1.0.0
     * 
     * @developer Pedro Cavaleiro
     * @created Sep 1, 2022
     * @lastedit Sep 1, 2022
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

    // checks if all fields contain data
    if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["nome"]) || !isset($_POST["passwordConfirmacao"]))
        header("Location: /admin/users?err=true");

    if ($_POST["password"] != $_POST["passwordConfirmacao"])
        header("Location: /admin/users?err=true");

    // attempts to login
    $app_instance->UserManagement->create_user($_POST["nome"], $_POST["email"], $_POST["password"]);
    
    header("Location: /admin/users?err=false");    

?>