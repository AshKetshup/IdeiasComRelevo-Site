<?php

    $APP_PATHS = array(
        "entities" => $_SERVER["DOCUMENT_ROOT"] . "/backend/entities",
        "database" => $_SERVER["DOCUMENT_ROOT"] . "/backend/database",
        "helpers" => $_SERVER["DOCUMENT_ROOT"] . "/backend/helpers",
        "modules" => $_SERVER["DOCUMENT_ROOT"] . "/backend/modules",
    );

    require_once $APP_PATHS["database"] . '/dbconnection.php';

    class AssociatesManagement {

        /** External Modules */
        private $db_context;

        /** Constructor, initialized the DbContext */
        function __construct() { 
            $this->db_context = new DbContext();
        }

        /** 
         * Gets all associates 
         */
        function admin_get_associates() {

            $connection = $this->db_context->initialize_connection();
            if ($connection == NULL) {
                $connection->close();
                return array();
            }

            $sql = "SELECT * FROM associates";
            $result = $connection->query($sql);

            $results = array();

            while($row = $result->fetch_assoc()) {
                array_push($results, AssociatesEntity::fromRow($row));
            }

            return $results;

        }

    }

?>