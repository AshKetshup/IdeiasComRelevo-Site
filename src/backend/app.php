<?php

    $APP_PATHS = array(
        "entities" => "backend/entities",
        "database" => "backend/database",
        "helpers" => "backend/helpers",
        "modules" => "backend/modules",
    );

    require_once $APP_PATHS["modules"] . '/extensions.php';
    require_once $APP_PATHS["entities"] . '/realestate.php';
    require_once $APP_PATHS["entities"] . '/contacts.php';
    require_once $APP_PATHS["entities"] . '/typology.php';
    require_once $APP_PATHS["entities"] . '/user.php';
    require_once $APP_PATHS["helpers"] . '/extensions.php';

    class IdeiasComRelevo {

        public $UserManagement;
        public $ProjectsManagement;
        
        /* Initializes the app modules */
        function __construct() { 
            $UserManagement = new UserManagement();
            $ProjectsManagement = new ProjectsManagement();
        }

    }

?>