<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage modules
     * 
     * Contains all the methods to handle the Associates entities
     * Version: 1.1.0
     * 
     * @developer Pedro Cavaleiro
     * @created Aug 18, 2022
     * @lastedit Aug 31, 2022
     * 
     * @issues no issues linked to this file
     * @todo no tasks pending
     * 
     */

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

        function add_associate($image, $name, $website) {

            $associateEntity = new AssociatesEntity();
            $associateEntity->set_logo($image);
            $associateEntity->set_name($name);
            $associateEntity->set_website($website);
            $associateEntity->insert();

        }

        function delete_associate($id) {
            $associateEntity = AssociatesEntity::fromId($id);
            $associateEntity->delete_entry();
        }

    }

?>