<?php

require_once 'typology.php';
require_once '../database/dbconnection.php';

class RealEstateEntity {

    /** Entity Variables */
    private $id;
    private $main_photo;
    private $photos;    
    private $zone;
    private $county;
    private $city;
    private $building_type;
    private $appartment_count;
    private $state;
    private $value;
    private $has_elevator;

    /** External Modules */
    private $db_context;
    
    /** Constructor covnerts database entry to Entity */
    function __construct() {
        $this->db_context = new DbContext();        
    }

    public static function fromId($id) {
        $instance = new self();
        $result = $instance->loadByID($id);
        if ($result == NULL)
            return NULL;
        return $instance;
    }

    public static function fromRow($entry) {
        $instance = new self();
        $instance->fill($entry);
        return $instance;
    }

    protected function loadByID($id) {
        $connection = $this->db_context->initialize_connection();
        if ($connection == NULL) {
            $connection->close();
            return NULL;
        }

        $sql = "SELECT * FROM realestate WHERE id='" . $id . "'";
        $result = $connection->query($sql);

        if ($result->num_rows <= 0) {
            $connection->close();
            return NULL;
        }

        $row = $result->fetch_assoc()[0];

        $this->fill($row);
    }

    protected function fill($entry) {
        $this->id = $entry['id'];
        $this->main_photo['main_photo'];
        $this->photos = explode(",", $entry['photos']);
        $this->zone = $entry['zone'];
        $this->county = $entry['county'];
        $this->city = $entry['city'];
        $this->building_type = $entry['building_type'];
        $this->appartment_count = $entry['appartment_count'];
        $this->state = $entry['state'];
        $this->value = $entry['value'];
        $this->has_elevator = $entry['has_elevator'];
    }

    /** Database Operations */
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
            $escaped_appartment_count = $connection->real_escape_string($this->appartment_count);
            $escaped_state = $connection->real_escape_string($this->state);
            $escaped_value = $connection->real_escape_string($this->value);
            $escaped_has_elevator = $connection->real_escape_string($this->has_elevator);
            $escaped_main_photo = $connection->real_escape_string($this->main_photo);
            $escaped_photos = $connection->real_escape_string(join(",", $this->photo));

            $sql = "UPDATE realestate SET photos='" . $escaped_photos . "', main_photo='" . $escaped_main_photo . "', zone='" . $escaped_zone . "', county='" . $escaped_county . "', city='" . $escaped_city . "', building_type='" . $escaped_building_type . "', appartment_count='" . $escaped_appartment_count . "', state='" . $escaped_state . "', value='" . $escaped_value . "', has_elevator='" . $escaped_has_elevator . " WHERE id='" . $this->id . "'";
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
            $sql2 = "DELETE FROM typology WHERE realstateid='" . $this->id . "'";
            if ($connection->query($sql1) === TRUE) {
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

    /** Getters */
    public function get_id() { return $this->id; }
    public function get_zone() { return $this->zone; }
    public function get_county() { return $this->county; }
    public function get_city() { return $this->city; }
    public function get_building_type() { return $this->building_type; }
    public function get_appartment_count() { return $this->appartment_count; }
    public function get_state() { return $this->value; }
    public function get_has_elevator() { return $this->has_elevator; } // true || false
    public function get_photos() { return $this->photos; } // string array with photos names (these names will be uuid's to ensure photo names are uniques)
    public function get_main_photo() { return $this->main_photo; }

    /** Setters */        
    public function set_zone($value) { $this->zone = $value; }
    public function set_county($value) { $this->county = $value; }
    public function set_city($value) { $this->city = $value; }
    public function set_building_type($value) { $this->building_type = $value; }
    public function set_appartment_count($value) { $this->appartment_count = $value; }
    public function set_state($_value) { $this->value = $_value; }
    public function set_has_elevator($value) { $this->has_elevator = $value; }
    public function set_photos($value) { $this->photos = $value; } // string array with photos names (these names will be uuid's to ensure photo names are unique)
    public function set_main_photo($value) { $this->main_photo = $value; }

}

?>