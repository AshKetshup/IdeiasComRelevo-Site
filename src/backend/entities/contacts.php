<?php

require_once 'backend/database/dbconnection.php';
require_once 'backend/helpers/extensions.php';

class ContactsEntity {

    /** Entity Variables */
    private $id;
    private $field;
    private $value;

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

    /** Creates a new Instance from a type */
    public static function fromType($type) {
        $instance = new self();
        $instance->loadByType($type);
        return $instance;
    }

    /** Performs the query to create a new instance with data */
    protected function loadByID($id) {
        $connection = $this->db_context->initialize_connection();
        if ($connection == NULL) {
            $connection->close();
            return NULL;
        }

        $sql = "SELECT * FROM contacts WHERE id='" . $id . "'";
        $result = $connection->query($sql);

        if ($result->num_rows <= 0) {
            $connection->close();
            return NULL;
        }

        $row = $result->fetch_assoc();

        $this->fill(current($row));
    }

    /** Performs the query to create a new instance with data */
    protected function loadByType($type) {
        $connection = $this->db_context->initialize_connection();
        if ($connection == NULL) {
            $connection->close();
            return NULL;
        }

        $sql = "SELECT * FROM contacts WHERE field='" . $type . "'";
        $result = $connection->query($sql);

        if ($result->num_rows <= 0) {
            $connection->close();
            return NULL;
        }
        
        $row = $result->fetch_assoc();
        $this->fill($row);
    }

    /** Creates the new instance giving the values from the row */
    protected function fill($entry) {
        $this->id = $entry['id'];
        $this->field = $entry['field'];
        $this->value = $entry['value'];
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
            $escaped_field = $connection->real_escape_string($this->field);
            $escaped_value = $connection->real_escape_string($this->value);

            $sql = "INSERT INTO contacts (id, field, vlaue) VALUES ('" . $this->id . "','" . $escaped_field  . "', '" . $escaped_value . "')";
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
            $escaped_field = $connection->real_escape_string($this->field);
            $escaped_value = $connection->real_escape_string($this->value);

            $sql = "UPDATE contacts SET field='" . $escaped_field . "', value='" . $escaped_value . "' WHERE id='" . $this->id . "'";
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
            $sql1 = "DELETE FROM contacts WHERE id='" . $this->id . "'";
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
    public function get_field() { return $this->field; }
    public function get_value() { return $this->value; }

    /** Setters */        
    public function set_field($value) { $this->value = $value; }
    public function set_value($value) { $this->field = $value; }

}

?>