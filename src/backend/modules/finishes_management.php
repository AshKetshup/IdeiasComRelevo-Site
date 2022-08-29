<?php

    $APP_PATHS = array(
        "entities" => $_SERVER["DOCUMENT_ROOT"] . "/backend/entities",
        "database" => $_SERVER["DOCUMENT_ROOT"] . "/backend/database",
        "helpers" => $_SERVER["DOCUMENT_ROOT"] . "/backend/helpers",
        "modules" => $_SERVER["DOCUMENT_ROOT"] . "/backend/modules",
    );

    require_once $APP_PATHS["database"] . '/dbconnection.php';

    class FinishesManagement {

        private $db_context;

        function __construct() { 
            $this->db_context = new DbContext();
        }

        function admin_get_finishes($area = -1) {

            $connection = $this->db_context->initialize_connection();
            if ($connection == NULL) {
                $connection->close();
                return array();
            }

            $sql = "";
            if ($area == -1)
                $sql = "SELECT * FROM finishes";
            else
                $sql = "SELECT * FROM finishes WHERE area='" . $area . "'";

            $result = $connection->query($sql);

            $results = array();

            while($row = $result->fetch_assoc()) {
                array_push($results, FinishesEntity::fromRow($row));
            }

            return $results;

        }

    }

?>