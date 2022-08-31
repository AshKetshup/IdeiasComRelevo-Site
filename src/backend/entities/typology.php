<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage entities
     * 
     * This file contains the Typology entity class which maps the table to a PHP class
     * Version: 1.4.1
     * 
     * @developer Pedro Cavaleiro
     * @created Jan 11, 2022
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

    require_once $APP_PATHS["entities"] . '/realestate.php';
    require_once $APP_PATHS["database"] . '/dbconnection.php';
    require_once $APP_PATHS["helpers"] . '/extensions.php';

    class TypologyEntity {

        /** Entity Variables */
        private $id;
        private $area;
        private $energy_category;
        private $typology; //t1, t2, t3...
        private $state;
        private $has_garage;
        private $rent_price;
        private $sell_price;
        private $floor;
        private $has_parking;
        private $wc_count;
        private $description;
        private $photos;
        private $rid; // this will hold the id to the realestate allowing lazy load

        /** Ref */
        private $realestate;

        /** Lazy Load Flags */
        private $loaded_realestate = false;

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

            $sql = "SELECT * FROM typology WHERE id='" . $id . "'";
            $result = $connection->query($sql);

            if ($result->num_rows <= 0) {
                $connection->close();
                return NULL;
            }

            $row = $result->fetch_assoc()[0];

            $this->fill($row);
        }

        /** Creates the new instance giving the values from the row */
        protected function fill($entry) {
            $this->id = $entry['id'];
            $this->area = $entry['area'];
            $this->photos = explode(",", $entry['photos']);
            $this->energy_category = $entry['energy_category'];
            $this->typology = $entry['typology'];
            $this->state = $entry['state'];
            $this->has_garage = $entry['has_garage'] == 1;
            $this->rent_price = $entry['rent_price'];
            $this->sell_price = $entry['sell_price'];
            $this->floor = $entry['floor'];
            $this->has_parking = $entry['has_parking'] == 1;
            $this->wc_count = $entry['wc_count'];
            $this->description = $entry['description'];
            $this->rid = $entry['rid'];
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
                $escaped_area = $connection->real_escape_string($this->area);
                $escaped_energy_category = $connection->real_escape_string($this->energy_category);
                $escaped_typology = $connection->real_escape_string($this->typology);                    
                $escaped_state = $connection->real_escape_string($this->state);
                $escaped_rent_price = $connection->real_escape_string($this->rent_price);
                $escaped_sell_price = $connection->real_escape_string($this->sell_price);
                $escaped_photos = "";
                if ($this->photos != NULL)
                    $connection->real_escape_string(join(",", $this->photos));
                $escaped_description = $connection->real_escape_string($this->description);
                $escaped_wc_count = $connection->real_escape_string($this->wc_count);
                $escaped_floor = $connection->real_escape_string($this->floor);

                $sql = "INSERT INTO typology (id, area, photos, energy_category, typology, `state`, has_garage, rent_price, sell_price, `floor`, has_parking, wc_count, `description`, rid) VALUES ('" . $this->id . "', '" . $escaped_area . "', '" . $escaped_photos . "', '" . $escaped_energy_category . "', '" . $escaped_typology . "', '" . $escaped_state . "', '" . ($this->has_garage ? 1 : 0) . "', '" . $escaped_rent_price . "', '" . $escaped_sell_price . "', '" . $escaped_floor . "', '" . ($this->has_parking ? 1 : 0) . "', '" . $escaped_wc_count . "', '" . $escaped_description . "', '" . $this->rid . "')";
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
                $escaped_area = $connection->real_escape_string($this->area);
                $escaped_energy_category = $connection->real_escape_string($this->energy_category);
                $escaped_typology = $connection->real_escape_string($this->typology);                    
                $escaped_state = $connection->real_escape_string($this->state);
                $escaped_rent_price = $connection->real_escape_string($this->rent_price);
                $escaped_sell_price = $connection->real_escape_string($this->sell_price);
                $escaped_photos = "";
                if ($this->photos != NULL)
                    $connection->real_escape_string(join(",", $this->photos));
                $escaped_description = $connection->real_escape_string($this->description);
                $escaped_wc_count = $connection->real_escape_string($this->wc_count);
                $escaped_floor = $connection->real_escape_string($this->floor);

                $sql = "UPDATE typology SET `area`='" . $escaped_area . "' photos='" . $escaped_photos . "', energy_category='" . $escaped_energy_category . "', `typology`='" . $escaped_typology . "', state='" . $escaped_state . "', has_garage='" . ($this->has_garage ? 1 : 0) . "', rent_price='" . $escaped_rent_price . "', `sell_price`='" . $escaped_sell_price . "', `floor`='" . $escaped_floor . "', has_parking='" . ($this->has_parking ? 1 : 0) . ", wc_count='" . $escaped_wc_count . "', description='" . $escaped_description . "', rid='" . $this->rid . "' WHERE id='" . $this->id . "'";
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
         * If there's a error initializing the connection or deleting the record an error returns false, otherwise returns true
         */
        public function delete_entry() {
            $result = false;

            $connection = $this->db_context->initialize_connection();
            if ($connection != NULL) {
                $sql = "DELETE FROM typology WHERE id='" . $this->id . "'";
                if ($connection->query($sql) === TRUE)
                    $result = true;                
                else
                    $result = false;
            } else 
                $result = false;

            $connection->close();
            return $result;
        }

        /* GETTERS */
        public function get_id() { return $this->id; }
        public function get_area() { return $this->area; }
        public function get_energy_category() { return $this->energy_category; }
        public function get_typology() { return $this->typology; }
        public function get_state() { return $this->state; }
        public function get_has_garage() { return $this->has_garage; }
        public function get_rent_price() { return $this->rent_price; }
        public function get_sell_price() { return $this->sell_price; }
        public function get_floor() { return $this->floor; }
        public function get_has_parking() { return $this->has_parking; }
        public function get_wc_count() { return $this->wc_count; }
        public function get_description() { return $this->description; }
        public function get_photos() { return $this->photos; }
        public function get_building() {
            if ($this->loaded_realestate)
                return $this->realestate;

            $result = NULL;

            $connection = $this->db_context->initialize_connection();
            if ($connection != NULL) {            
                $sql = "SELECT * FROM realestate WHERE id='" . $this->rid . "'";
                $result = $connection->query($sql);

                if ($result->num_rows <= 0) {
                    $connection->close();
                    return NULL;
                }

                $this->realestate = RealEstateEntity::fromRow($result->fetch_assoc()[0]);
                $this->loaded_realestate = true;
            } else 
                $result = false;

            $connection->close();
            return $result;
        }

        /* SETTERS */
        public function set_area($value) { $this->area = $value; }
        public function set_energy_category($value) { $this->energy_category = $value; }
        public function set_typology($value) { $this->typology = $value; }
        public function set_state($value) { $this->state = $value; }
        public function set_has_garage($value) { $this->has_garage = $value; }
        public function set_rent_price($value) { $this->rent_price = $value; }
        public function set_sell_price($value) { $this->sell_price = $value; }
        public function set_floor($value) { $this->floor = $value; }
        public function set_has_parking($value) { $this->has_parking = $value; }
        public function set_wc_count($value) { $this->wc_count = $value; }
        public function set_available($value) { $this->available = $value; }
        public function set_description($value) { $this->description = $value; }
        public function set_photos($value) { $this->photos = $value; }
        public function set_building($value) { 
            $this->rid = $value->get_id(); 
            $this->realestate = $value;
        }

        /**
         * Reloads the building data for this typology
         */
        public function reload_building() {
            $result = NULL;

            $connection = $this->db_context->initialize_connection();
            if ($connection != NULL) {            
                $sql = "SELECT * FROM realestate WHERE id='" . $this->rid . "'";
                $result = $connection->query($sql);

                if ($result->num_rows <= 0) {
                    $connection->close();
                    return NULL;
                }

                $this->realestate = RealEstateEntity::fromRow($result->fetch_assoc()[0]);
                $this->loaded_realestate = true;
            } else 
                $result = false;

            $connection->close();
            return $result;
        }
    }

?>