<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage entities
     * 
     * This file contains the Realestate entity class which maps the table to a PHP class
     * Version: 1.3.4
     * 
     * @developer Pedro Cavaleiro
     * @created Jan 11, 2022
     * @lastedit Sep 2, 2022
     * 
     * @issues no issues linked to this file
     * @todo no tasks pending
     * 
     */

use function PHPSTORM_META\map;

    $APP_PATHS = array(
        "entities" => $_SERVER["DOCUMENT_ROOT"] . "/backend/entities",
        "database" => $_SERVER["DOCUMENT_ROOT"] . "/backend/database",
        "helpers" => $_SERVER["DOCUMENT_ROOT"] . "/backend/helpers",
        "modules" => $_SERVER["DOCUMENT_ROOT"] . "/backend/modules",
    );

    require_once $APP_PATHS["entities"] . '/typology.php';
    require_once $APP_PATHS["database"] . '/dbconnection.php';
    require_once $APP_PATHS["helpers"] . '/extensions.php';

    class RealEstateEntity {

        /** Entity Variables */
        private $id;
        private $title;
        private $main_photo;
        private $photos;    
        private $zone;
        private $county;
        private $city;
        private $building_type;
        private $state;
        private $value;
        private $has_elevator;
        private $description;
        private $floor_count;

        /** Refs */
        private $appts;

        /** Lazy Load Flags */
        private $loaded_appts = false;

        /** External Modules */
        private $db_context;
        
        /** Constructor converts database entry to Entity */
        function __construct() {
            $this->db_context = new DbContext();  
            $this->photos = array();      
        }

        /** Creates a new Instance from the typology id */
        public static function fromId($id) {
            $instance = new self();
            $result = $instance->loadByID($id);
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

            $sql = "SELECT * FROM realestate WHERE id='" . $id . "'";
            $result = $connection->query($sql);

            $row = $result->fetch_assoc();

            $this->fill($row);
        }

        /** Creates the new instance giving the values from the row */
        protected function fill($entry) {
            $this->id = $entry['id'];
            $this->main_photo = $entry['main_photo'];
            $this->photos = explode(",", $entry['photos']);
            $this->zone = $entry['zone'];
            $this->county = $entry['county'];
            $this->city = $entry['city'];
            $this->building_type = $entry['building_type'];
            $this->state = $entry['state'];
            $this->value = $entry['value'];
            $this->has_elevator = $entry['has_elevator'] == 1;
            $this->description = $entry['description'];
            $this->title = $entry['title'];
            $this->floor_count = $entry["floor_count"];
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
                $escaped_zone = $connection->real_escape_string($this->zone);
                $escaped_county = $connection->real_escape_string($this->county);
                $escaped_city = $connection->real_escape_string($this->city);
                $escaped_building_type = $connection->real_escape_string($this->building_type);            
                $escaped_state = $connection->real_escape_string($this->state);
                $escaped_value = $connection->real_escape_string($this->value);
                $escaped_main_photo = $connection->real_escape_string($this->main_photo);
                $escaped_photos = "";
                if ($this->photos != NULL)
                    $escaped_photos = $connection->real_escape_string(join(",", $this->photos));
                $escaped_description = $connection->real_escape_string($this->description);
                $escaped_title = $connection->real_escape_string($this->title);
                $escaped_floor_count = $connection->real_escape_string($this->floor_count);

                $sql = "INSERT INTO realestate (`description`, id, title, photos, main_photo, `zone`, county, city, building_type, `state`, `value`, has_elevator, floor_count) VALUES ('" . $escaped_description . "', '" . $this->id . "', '" . $escaped_title . "','" . $escaped_photos  . "', '" . $escaped_main_photo  . "', '" . $escaped_zone  . "', '" . $escaped_county  . "', '" . $escaped_city . "', '" . $escaped_building_type  . "', '" . $escaped_state . "', '" . $escaped_value . "', '" . ($this->has_elevator == true ? 1 : 0)  . "', '" . $escaped_floor_count . "')";
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
                $escaped_zone = $connection->real_escape_string($this->zone);
                $escaped_county = $connection->real_escape_string($this->county);
                $escaped_city = $connection->real_escape_string($this->city);
                $escaped_building_type = $connection->real_escape_string($this->building_type);
                $escaped_state = $connection->real_escape_string($this->state);
                $escaped_value = $connection->real_escape_string($this->value);
                $escaped_main_photo = $connection->real_escape_string($this->main_photo);
                $escaped_photos = "";
                if ($this->photos != NULL)
                    $escaped_photos = $connection->real_escape_string(join(",", $this->photos));
                $escaped_description = $connection->real_escape_string($this->description);
                $escaped_title = $connection->real_escape_string($this->title);
                $escaped_floor_count = $connection->real_escape_string($this->floor_count);

                $sql = "UPDATE realestate SET `description`='" . $escaped_description . "', photos='" . $escaped_photos . "', main_photo='" . $escaped_main_photo . "', `zone`='" . $escaped_zone . "', county='" . $escaped_county . "', city='" . $escaped_city . "', building_type='" . $escaped_building_type . "', `state`='" . $escaped_state . "', `value`='" . $escaped_value . "', has_elevator='" .($this->has_elevator == true ? 1 : 0) . "', title='" . $escaped_title . "', floor_count='" . $escaped_floor_count . "' WHERE id='" . $this->id . "'";
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
                $sql1 = "DELETE FROM realestate WHERE id='" . $this->id . "'";
                $sql2 = "DELETE FROM typology WHERE rid='" . $this->id . "'";
                if ($connection->query($sql1) === TRUE) {
                    foreach($this->photos as $photo)
                        unlink($_SERVER["DOCUMENT_ROOT"] . "/uploads/" . $photo);

                    if ($connection->query($sql2) === TRUE)
                        $result = true;
                    else
                        $result = false;
                } else
                    $result = false;
            } else 
                $result = false;

            $connection->close();
            return $result;
        }

        public function clear_typologies() {
            $result = false;

            $connection = $this->db_context->initialize_connection();
            if ($connection != NULL) {
                $sql = "DELETE FROM typology WHERE rid='" . $this->id . "'";
                if ($connection->query($sql) === TRUE)
                    $result = true;                
                else
                    $result = false;
            } else 
                $result = false;

            $connection->close();

            if ($this->loaded_appts)
                $this->reload_appartments();

            return $result;
        }

        public function delete_image($imageName) {
            $key = array_search($imageName, $this->photos);
            if (false !== $key) {
                array_splice($this->photos, array_search($val, $this->photos), 1);
            }
            unlink($_SERVER["DOCUMENT_ROOT"] . "/uploads/" . $imageName);
        }
        public function add_image($imageName) {
            array_push($this->photos, $imageName);
        }

        /** Getters */
        public function get_id() { return $this->id; }
        public function get_zone() { return $this->zone; }
        public function get_county() { return $this->county; }
        public function get_city() { return $this->city; }
        public function get_building_type() { return $this->building_type; }
        public function get_appartment_count() { 
            $result = false;

            $connection = $this->db_context->initialize_connection();
            if ($connection != NULL) {            
                $sql = "SELECT COUNT(id) AS apptcount FROM typology WHERE rid='" . $this->id . "'";
                $result = $connection->query($sql);

                if ($result->num_rows <= 0) {
                    $connection->close();
                    return 0;
                }

                $row = $result->fetch_assoc();
                $result = $row["apptcount"];
            } else 
                $result = false;

            $connection->close();
            return $result;
        }
        public function get_state() { return $this->state; }
        public function get_has_elevator() { return $this->has_elevator; } // true || false
        public function get_photos() { return $this->photos; } // string array with photos names (these names will be uuid's to ensure photo names are uniques)
        public function get_main_photo() { return $this->main_photo; }
        public function get_appartments() {
            if ($this->loaded_appts)
                return $this->appts;

            $rtn = array();

            $connection = $this->db_context->initialize_connection();
            if ($connection != NULL) {            
                $sql = "SELECT * FROM typology WHERE rid='" . $this->id . "'";
                $result = $connection->query($sql);

                if ($result->num_rows <= 0) {
                    $connection->close();
                    return $result;
                }

                while($row = $result->fetch_assoc()) {
                    array_push($rtn, TypologyEntity::fromRow($row));
                }
                $this->appts = $rtn;
                $this->loaded_appts = true;
            } else 
                $rtn = false;

            $connection->close();
            return $rtn;
        }

        /**
         * Gets all the variables from the current object
         * it ignores the "db_context" and "loaded_appts" as they should not be included on the array
         * during processing of the typologies the "db_context", "photos", "realestate" and "loaded_realestate" variables are also removed
         */
        private function obj_to_array() {
            $dta_appts = array();
            foreach($this->appts as $appt) {
                $apptVars = $appt->expose();
                unset($apptVars['db_context']);
                unset($apptVars['photos']);
                unset($apptVars['realestate']);
                unset($apptVars['loaded_realestate']);
                array_push($dta_appts, $apptVars);
            }                
            $currVars = get_object_vars($this);
            unset($currVars['db_context']);
            unset($currVars['loaded_appts']);
            
            $currVars['appts'] = $dta_appts;
            return $currVars;
        }

        /**
         * Gets the current object instance as a JSON
         * @param bool $ignorePhotos ignores the photos by not adding them to the json. Defaults to true
         * @return string The JSON string corresponding to the current object
         */
        public function get_json($ignorePhotos = true) {
            $vars = $this->obj_to_array();
            if ($ignorePhotos) {
                unset($vars['main_photo']);
                unset($vars['photos']);
            }
            return json_encode($vars);
        }

        /**
         * If it's a appt building the function will fetch from the typologies the lowest rent and sell prices
         * and will return an array with the keys "rent" and "sell" with the according values
         * 
         * Any other kind of building it will only return it's value
         */
        public function get_value() {
            if ($this->building_type == 1) {
                $result = array();

                $connection = $this->db_context->initialize_connection();
                if ($connection != NULL) {                              
                    $sql1 = "SELECT rent_price AS `value` FROM typology WHERE rid='" . $this->id . "' AND (`state` = 2 OR `state` = 3) ORDER BY rent_price ASC LIMIT 1";
                    $sql2 = "SELECT sell_price AS `value` FROM typology WHERE rid='" . $this->id . "' AND (`state` = 1 OR `state` = 3) ORDER BY sell_price ASC LIMIT 1";
                    
                    $result1 = $connection->query($sql1);
                    $result2 = $connection->query($sql2);

                    if ($result1->num_rows <= 0 && $result2->num_rows <= 0) {
                        $connection->close();
                        return NULL;
                    }

                    $connection->close();                    
                    $values = [
                        "rent" => $result1->fetch_assoc()['value'],
                        "sell" => $result2->fetch_assoc()['value']
                    ];
                    return $values;
                } else 
                    $result = false;

                $connection->close();
                return $result;
            } else
                return $this->value;
        }    
        public function get_description() { return $this->description; }
        public function get_title() { return $this->title; }
        public function get_floor_count() { return $this->floor_count; }

        public function isHomogenous(array $arr, $testValue = null) {
            // If they did not pass the 2nd func argument, then we will use an arbitrary value in the $arr (that happens to be the first value).
            // By using func_num_args() to test for this, we can properly support testing for an array filled with nulls, if desired.
            // ie isHomogenous([null, null], null) === true
            $testValue = func_num_args() > 1 ? $testValue : reset($arr);
            foreach ($arr as $val) {
                if ($testValue !== $val) {
                    return false;
                }
            }

            return true;
        }

        public function get_sale_type() {
            $this->reload_appartments();

            $appt_mapped = array_map(function($el) { return $el->get_state(); }, $this->appts );

            if ((in_array(1, $appt_mapped) && in_array(2, $appt_mapped)) || in_array(3, $appt_mapped))
                return 3;

            if ($this->isHomogenous($appt_mapped))
                return $appt_mapped[0];
            else
                return array_filter(
                    $appt_mapped, 
                    function($el) {
                        return $el !== 4;
                    }
                )[0];

            // foreach($this->appts as $appt) {
            //     // case unset $id and the state of this appartment aint 4
            //     if ($id == -1 && $appt->get_state() != 4)
            //         $id = $appt->get_state();               // we define it to self state (0,1,2,3)
                
            //     // case $id = vende-se and the current appartment state being aluga-se
            //     if ($id == 1 && $appt->get_state() == 2)
            //         $id = 3;                                // $id = vende-se e aluga-se

            //     // case $id = aluga-se and the current appartment state being vende-se
            //     if ($id == 2 && $appt->get_state() == 1)
            //         $id = 3;                                // $id = vende-se e aluga-se

            //     // case current state is vendido it ignores
            //     if ($appt->get_state() == 4)
            //         continue;
            // }
            // return $id;
        }

        /** Setters */        
        public function set_zone($value) { $this->zone = $value; }
        public function set_county($value) { $this->county = $value; }
        public function set_city($value) { $this->city = $value; }
        public function set_building_type($value) { $this->building_type = $value; }
        public function set_value($_value) { $this->value = $_value; }
        public function set_state($value) { $this->state = $value; }
        public function set_has_elevator($value) { $this->has_elevator = $value; }
        public function set_photos($value) { $this->photos = $value; } // string array with photos names (these names will be uuid's to ensure photo names are unique)
        public function set_main_photo($value) { $this->main_photo = $value; }
        public function set_description($value) { $this->description = $value; }
        public function set_floor_count($value) { $this->floor_count = $value; }
        public function set_title($value) { $this->title = $value; }

        /** Refresh References */
        public function reload_appartments() {
            $rtn = array();

            $connection = $this->db_context->initialize_connection();
            if ($connection != NULL) {            
                $sql = "SELECT * FROM typology WHERE rid='" . $this->id . "'";
                $result = $connection->query($sql);

                if ($result->num_rows <= 0) {
                    $connection->close();
                    return $result;
                }

                while($row = $result->fetch_assoc()) {
                    array_push($rtn, TypologyEntity::fromRow($row));
                }
                $this->appts = $rtn;
                $this->loaded_appts = true;
            } else 
                $rtn = false;

            $connection->close();
            return $rtn;
        }

    }

?>