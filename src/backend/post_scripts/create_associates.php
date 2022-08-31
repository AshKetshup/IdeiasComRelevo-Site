<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage post_scripts
     * 
     * Handles a post sent from the frontend to create a associate
     * Version: 1.0.0
     * 
     * @developer Pedro Cavaleiro
     * @created Aug 31, 2022
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

    $target_dir = $_SERVER["DOCUMENT_ROOT"] . "/uploads/";

    $extension = pathinfo(basename($_FILES["imagem"]["name"]), PATHINFO_EXTENSION);
    $uuid = guidv4();
    $filename = $uuid . "." . $extension;

    $full_path = $target_dir . $filename;

    $uploaded = 0;

    // checks the file size (max 32M)
    if ($_FILES["imagem"]["size"] > 33554432) {
        $uploaded = 0;
    }
    
    // checks if it's an image
    $check = getimagesize($_FILES["imagem"]["tmp_name"]);
    if($check !== false) {
        $uploaded = 1;
    } else {
        $uploaded = 0;
    }

    // check if the extension is valid
    if($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif" ) {
        $uploaded = 0;
    }

    // checks if the upload is valid
    if ($uploaded == 0) {
        header("Location: /admin/associados?err=true");
    } else {
        // saves the file in the correct directory 
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $full_path)) {
            $app_instance->AssociateManagement->add_associate($filename, $_POST['nome'], isset($_POST['website']) ? $_POST['website'] : '');
            header("Location: /admin/associados?err=false");
        } else {
            header("Location: /admin/associados?err=true");
        }
    }

?>