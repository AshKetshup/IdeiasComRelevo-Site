<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage post_scripts
     * 
     * Handles a post sent from the frontend to create a project
     * Version: 2.0.1
     * 
     * @developer Pedro Cavaleiro
     * @created Aug 29, 2022
     * @lastedit Sep 2, 2022
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

    // var_dump($_POST);
    // die();

    $images = array();
    $count = count($_FILES['imagens']['name']);
    for ($i=0; $i < $count; $i++) {
        
        $extension = pathinfo(basename($_FILES['imagens']["name"][$i]), PATHINFO_EXTENSION);
        $uuid = guidv4();
        $filename = $uuid . "." . $extension;

        if ($_FILES['imagens']['size'][$i] > 33554432) {
            http_response_code(500);
            echo "file too big";
            die();
        }

        $check = getimagesize($_FILES['imagens']["tmp_name"][$i]);
        if($check == false) {
            http_response_code(500);
            echo "the file is not a image";
            die();
        }

        if($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif" ) {
            http_response_code(500);
            echo "the file is not a image";
            die();
        }

        array_push($images, $filename);

        $full_path = $target_dir . $filename;

        if (!move_uploaded_file($_FILES["imagens"]["tmp_name"][$i], $full_path)) {
            http_response_code(500);
            echo "error saving image";
            die();
        }

    }
    
    // creates the project
    $app_instance->ProjectsManagement->create_project($images, $_POST, $_POST['tipologia']);

    header("Location: /admin/projetos?err=false");
    

?>
