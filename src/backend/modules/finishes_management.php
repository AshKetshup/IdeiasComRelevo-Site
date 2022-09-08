<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage modules
     * 
     * Contains all the methods to handle the Finishes entities
     * Version: 1.2.0
     * 
     * @developer Pedro Cavaleiro
     * @created Aug 29, 2022
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

    class FinishesManagement {

        /** External Modules */
        private $db_context;

        /** Constructor, initializes the DbContext */
        function __construct() { 
            $this->db_context = new DbContext();
        }

        /**
         * Gets the finishes from the database
         * @param $area, the type of finishes that we are fetching works as filter. Defaults to -1 which returns all finishes
         */
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

        function delete_finsh($id) {
            $finishEntity = FinishesEntity::fromId($id);
            $finishEntity->delete_entry();
        }

        function add_finish($image, $area) {
            $finishEntity = new FinishesEntity();
            $finishEntity->set_image($image);
            $finishEntity->set_area($area);
            $finishEntity->insert();
        }

        /**
         * Converts the typology state id (int) to the matching string
         * @param $id the typology state as string
         */
        public static function catshort_to_id($id) {
            $cat = array(
                "WC" => 0,
                "CS" => 1,
                "AS" => 2,
                "OP" => 3,
                "I"  => 4
            );
            return $cat[$id];
        }

    }

?>