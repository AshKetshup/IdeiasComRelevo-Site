<?php

require_once 'backend/entities/typology.php';
require_once 'backend/database/dbconnection.php';
require_once 'backend/helpers/extensions.php';

class RealEstateEntity {

    /** Entity Variables */
    private $id;
    private $main_photo;
    private $photos;    
    private $zone;
    private $county;
    private $city;
    private $building_type; // 0 = appt buiding 
    private $state;
    private $value;
    private $has_elevator;
    private $description;

    /** Refs */
    private $appts;

    /** Lazy Load Flags */
    private $loaded_appts = false;

    /** External Modules */
    private $db_context;
    
    /** Constructor covnerts database entry to Entity */
    function __construct() {
        $this->db_context = new DbContext();        
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
        $this->appartment_count = $entry['appartment_count'];
        $this->state = $entry['state'];
        $this->value = $entry['value'];
        $this->has_elevator = $entry['has_elevator'];
        $this->description = $entry['description'];
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
            $escaped_has_elevator = $connection->real_escape_string($this->has_elevator);
            $escaped_main_photo = $connection->real_escape_string($this->main_photo);
            $escaped_photos = $connection->real_escape_string(join(",", $this->photo));
            $escaped_description = $connection->real_escape_string($this->$description);

            $sql = "INSERT INTO realestate (`description`, id, photos, main_photo, `zone`, county, city, building_type, `state`, `value`, has_elevator) VALUES ('" . $escaped_description . "', '" . $this->id . "','" . $escaped_photos  . "', '" . $escaped_main_photo  . "', '" . $escaped_value  . "', '" . $escaped_county  . "', '" . $escaped_city . "', '" . $escaped_building_type  . "', '" . $escaped_state . "', '" . $escaped_value . "', '" . $escaped_has_elevator . "')";
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
            $escaped_has_elevator = $connection->real_escape_string($this->has_elevator);
            $escaped_main_photo = $connection->real_escape_string($this->main_photo);
            $escaped_photos = $connection->real_escape_string(join(",", $this->photo));
            $escaped_description = $connection->real_escape_string($this->$description);

            $sql = "UPDATE realestate SET `description`='" . $escaped_description . "' photos='" . $escaped_photos . "', main_photo='" . $escaped_main_photo . "', `zone`='" . $escaped_zone . "', county='" . $escaped_county . "', city='" . $escaped_city . "', building_type='" . $escaped_building_type . "', `state`='" . $escaped_state . "', `value`='" . $escaped_value . "', has_elevator='" . $escaped_has_elevator . " WHERE id='" . $this->id . "'";
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

        $result = array();

        $connection = $this->db_context->initialize_connection();
        if ($connection != NULL) {            
            $sql = "SELECT * FROM typology WHERE rid='" . $this->id . "'";
            $result = $connection->query($sql);

            if ($result->num_rows <= 0) {
                $connection->close();
                return $result;
            }

            while($row = $result->fetch_assoc()) {
                array_push($result, TypologyEntity::fromRow($row));
            }
            $this->appts = $result;
            $this->loaded_appts = true;
        } else 
            $result = false;

        $connection->close();
        return $result;
    }
    public function get_value() {
        if ($this->building_type == 0) {
            $result = array();

            $connection = $this->db_context->initialize_connection();
            if ($connection != NULL) {            
                $sql = "SELECT rent_price, sell_price FROM typology WHERE rid='" . $this->id . "' ORDER BY rent_price ASC, sell_price ASC";
                $result = $connection->query($sql);

                if ($result->num_rows <= 0) {
                    $connection->close();
                    return NULL;
                }

                $connection->close();
                return $result->fetch_assoc()[0];
            } else 
                $result = false;

            $connection->close();
            return $result;
        } else
            return $this->value;
    }    
    public function get_description() { return $this->description; }

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

    /** Refresh References */
    public function reload_appartments() {
        $result = array();

        $connection = $this->db_context->initialize_connection();
        if ($connection != NULL) {            
            $sql = "SELECT * FROM typology WHERE rid='" . $this->id . "'";
            $result = $connection->query($sql);

            if ($result->num_rows <= 0) {
                $connection->close();
                return $result;
            }

            while($row = $result->fetch_assoc()) {
                array_push($result, TypologyEntity::fromRow($row));
            }
            $this->appts = $result;
            $this->loaded_appts = true;
        } else 
            $result = false;

        $connection->close();
        return $result;
    }

}

?>