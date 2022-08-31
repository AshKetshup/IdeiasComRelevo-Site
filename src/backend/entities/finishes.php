<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage entities
     * 
     * This file contains the Finishes entity class which maps the table to a PHP class
     * Version: 1.0.1
     * 
     * @developer Pedro Cavaleiro
     * @created Aug 29, 2022
     * @lastedit Aug 30, 2022
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
    require_once $APP_PATHS["helpers"] . '/extensions.php';

    class FinishesEntity {

        /** Entity Variables */
        private $id;
        private $image;
        private $area;

        /** External Modules */
        private $db_context;
        
        /** Constructor converts database entry to Entity */
        function __construct() {
            $this->db_context = new DbContext();
        }

        /** Creates a new Instance from the typology id */
        public static function fromId($id) {
            $instance = new self();
            $instance->loadByID($id);
            return $instance;
        }

        /** Creates a new Instance from a row */
        public static function fromRow($entry) {
            $instance = new self();
            $instance->fill($entry);
            return $instance;
        }

        /** Performs the query to create a new instance with data */
        protected function loadByID($id) {
            $connection = $this->db_context->initialize_connection();
            if ($connection == NULL) {
                $connection->close();
                return NULL;
            }

            $sql = "SELECT * FROM finishes WHERE id='" . $id . "'";
            $result = $connection->query($sql);

            if ($result->num_rows <= 0) {
                $connection->close();
                return NULL;
            }

            $row = $result->fetch_assoc();

            $this->fill(current($row));
        }

        /** Creates the new instance giving the values from the row */
        protected function fill($entry) {
            $this->id = $entry['id'];
            $this->image = $entry['image'];
            $this->area = $entry['area'];
        }

        /** Database Operations */

        /** Adds the entity to the database 
         * If there's a error initializing the connection or inserting the record an error returns false, otherwise returns true
        */
        public function insert() {
            $result = false;

            $connection = $this->db_context->initialize_connection();
            if ($connection != NULL) {
                $this->id = guidv4();            
                $escaped_image = $connection->real_escape_string($this->image);
                $escaped_area = $connection->real_escape_string($this->area);

                $sql = "INSERT INTO finishes (id, `image`, `area`) VALUES ('" . $this->id . "','" . $escaped_image  . "', '" . $escaped_area . "')";
                if ($connection->query($sql) === TRUE)
                    $result = true;
                else
                    $result = false;
            } else 
                $result = false;

            $connection->close();
            return $result;
        }

        /** 
         * Updates the entry on the database 
         * If there's a error initializing the connection or updating the record an error returns false, otherwise returns true
         */
        public function update_changes() {
            $result = false;

            $connection = $this->db_context->initialize_connection();
            if ($connection != NULL) {
                $escaped_image = $connection->real_escape_string($this->image);
                $escaped_area = $connection->real_escape_string($this->area);

                $sql = "UPDATE finishes SET `image`='" . $escaped_image . "', area='" . $escaped_area . "' WHERE id='" . $this->id . "'";
                if ($connection->query($sql) === TRUE)
                    $result = true;
                else
                    $result = false;
            } else 
                $result = false;

            $connection->close();
            return $result;
        }

        /** 
         * Deletes the entry from the database,
         * If entry has associated typology entities those will also be deleted
         * If there's a error initializing the connection or deleting the record an error returns false, otherwise returns true
         */
        public function delete_entry() {
            $result = false;

            $connection = $this->db_context->initialize_connection();
            if ($connection != NULL) {            
                $sql1 = "DELETE FROM finishes WHERE id='" . $this->id . "'";
                if ($connection->query($sql1) === TRUE) {                
                    $result = true;
                } else
                    $result = false;
            } else 
                $result = false;

            $connection->close();
            return $result;
        }

        /** Getters */
        public function get_id() { return $this->id; }
        public function get_image() { return $this->image; }
        public function get_area() { return $this->area; }

        /** Setters */        
        public function set_image($value) { $this->image = $value; }
        public function set_area($value) { $this->area = $value; }

    }

?>