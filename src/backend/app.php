<?php

    session_start();

    if (!$ALLOW_ANNONYMOUS && !$_SESSION["loggedin"])
        header('Location: /admin/login');

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $APP_PATHS = array(
        "entities" => $_SERVER["DOCUMENT_ROOT"] . "/backend/entities",
        "database" => $_SERVER["DOCUMENT_ROOT"] . "/backend/database",
        "helpers" => $_SERVER["DOCUMENT_ROOT"] . "/backend/helpers",
        "modules" => $_SERVER["DOCUMENT_ROOT"] . "/backend/modules",
    );
    
    require_once $APP_PATHS["entities"] . '/realestate.php';
    require_once $APP_PATHS["entities"] . '/contacts.php';
    require_once $APP_PATHS["entities"] . '/typology.php';
    require_once $APP_PATHS["entities"] . '/user.php';
    require_once $APP_PATHS["entities"] . '/associates.php';
    require_once $APP_PATHS["entities"] . '/finishes.php';
    require_once $APP_PATHS["helpers"] . '/extensions.php';
    require_once $APP_PATHS["modules"] . '/user_management.php';
    require_once $APP_PATHS["modules"] . '/projects_management.php';
    require_once $APP_PATHS["modules"] . '/associates_management.php';
    require_once $APP_PATHS["modules"] . '/finishes_management.php';

    class IdeiasComRelevo {

        public $UserManagement;
        public $ProjectsManagement;     
        public $AssociateManagement;   
        public $FinishesManagement;
        
        /* Initializes the app modules */
        function __construct() { 
            $this->UserManagement = new UserManagement();
            $this->ProjectsManagement = new ProjectsManagement();   
            $this->AssociateManagement = new AssociatesManagement();
            $this->FinishesManagement = new FinishesManagement();
        }

    }

?>