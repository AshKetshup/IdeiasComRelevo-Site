<?php

    // starts the php session
    session_start();       

    // configures the error log
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // helper for the different backend paths
    $APP_PATHS = array(
        "entities" => $_SERVER["DOCUMENT_ROOT"] . "/backend/entities",
        "database" => $_SERVER["DOCUMENT_ROOT"] . "/backend/database",
        "helpers" => $_SERVER["DOCUMENT_ROOT"] . "/backend/helpers",
        "modules" => $_SERVER["DOCUMENT_ROOT"] . "/backend/modules",
    );
    
    // imports for all the necessary classes
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
    require_once $APP_PATHS["modules"] . '/contacts_management.php';

    class IdeiasComRelevo {

        /* App modules */
        public $UserManagement;
        public $ProjectsManagement;     
        public $AssociateManagement;   
        public $FinishesManagement;
        public $ContactsManagement;
        
        /* Initializes the app modules */
        function __construct() { 
            $this->UserManagement = new UserManagement();
            $this->ProjectsManagement = new ProjectsManagement();   
            $this->AssociateManagement = new AssociatesManagement();
            $this->FinishesManagement = new FinishesManagement();
            $this->ContactsManagement = new ContactManagement();
        }

        /**
         * Verifies if the user is logged in
         * If it is, it returns an array with the session variables
         * If it's not it returns false
         */ 
        public static function verify_login() {
            if (isset($_SESSION['loggedin']) && $_SESSION["loggedin"]) {
                return array(
                    "uid" => $_SESSION["uid"],
                    "email" => $_SESSION["email"],
                    "name" => $_SESSION["name"]
                );
            }
            return false;
        }

    }

?>