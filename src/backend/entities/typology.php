<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/entities/typology.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/database/dbconnection.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/helpers/extensions.php';

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
    private $available;
    private $description;
    private $photos;
    private $rid; // this will hold the id to the realestate allowing lazy load

    /** Ref */
    private $realestate;

    /** Lazy Load Flags */
    private $loaded_realestate = false;

    /** External Modules */
    private $db_context;

    /** Constructor covnerts database entry to Entity */
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
        $this->has_garage = $entry['has_garage'];
        $this->rent_price = $entry['rent_price'];
        $this->sell_price = $entry['sell_price'];
        $this->floor = $entry['floor'];
        $this->has_parking = $entry['has_parking'];
        $this->wc_count = $entry['wc_count'];
        $this->available = $entry['available'];
        $this->description = $entry['description'];
        $this->rid = $entry['rid'];
    }

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
    public function get_available() { return $this->available; }
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