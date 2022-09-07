<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage post_scripts
     * 
     * Handles a post sent from the frontend to change the contacts
     * Version: 1.0.0
     * 
     * @developer Pedro Cavaleiro
     * @created Aug 29, 2022
     * @lastedit Aug 30, 2022
     * 
     * @issues no issues linked to this file
     * @todo no tasks pending
     * 
     */

    // starts the app
    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    // verifies if all fields contain data if not redirects to the same page setting the err to true
    if (!isset($_POST["telemovel"]) || !isset($_POST["email"]) || !isset($_POST["sede"]) || !isset($_POST['sobrenos']))
        header("Location: /admin/informacoes?err=true");

    // updates the contacts and redirects to the same page setting the err to false
    $app_instance->ContactsManagement->update_contacts($_POST["telemovel"], $_POST["email"], $_POST["sede"], $_POST['sobrenos']);
    header("Location: /admin/informacoes?err=false");

?>