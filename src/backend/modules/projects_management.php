<?php

    $APP_PATHS = array(
        "entities" => $_SERVER["DOCUMENT_ROOT"] . "/backend/entities",
        "database" => $_SERVER["DOCUMENT_ROOT"] . "/backend/database",
        "helpers" => $_SERVER["DOCUMENT_ROOT"] . "/backend/helpers",
        "modules" => $_SERVER["DOCUMENT_ROOT"] . "/backend/modules",
    );

    require_once $APP_PATHS["database"] . '/dbconnection.php';

    class ProjectsManagement {

        private $db_context;

        function __construct() { 
            $this->db_context = new DbContext();
        }

        function admin_get_projects() {

            $connection = $this->db_context->initialize_connection();
            if ($connection == NULL) {
                $connection->close();
                return array();
            }

            $sql = "SELECT * FROM realestate";
            $result = $connection->query($sql);

            $results = array();

            while($row = $result->fetch_assoc()) {
                array_push($results, RealEstateEntity::fromRow($row));
            }

            return $results;

        }

        public static function building_type_id_to_string($id) {
            $building_types = array(
                1 => "Prédio",
                2 => "Moradia Isolada",
                3 => "Moradia Germinada",
                4 => "Loja"
            );
            return $building_types[$id];
        }

        public static function building_state_id_to_string($id) {
            $building_types = array(
                0 => "-",
                1 => "Vende-se",
                2 => "Aluga-se",
                3 => "Vendido"
            );
            return $building_types[$id];
        }

    }

?>