<?php

require_once 'typology.php';
require_once '../database/dbconnection.php';
require_once '../helpers/extensions.php';

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
        if ($result == NULL)
            return NULL;
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
        $this->area['area'];
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

}

?>