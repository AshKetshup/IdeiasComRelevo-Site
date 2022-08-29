<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/database/dbconnection.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/helpers/extensions.php';

class UserEntity {

    public $id;
    public $name;
    public $email;

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

        $sql = "SELECT * FROM users WHERE id='" . $id . "'";
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
        $this->name['name'];
        $this->email = $entry['email'];
    }

    public static function attempt_login($email, $password) {
        $result = false;

        $connection = $this->db_context->initialize_connection();
        if ($connection != NULL) {            
            $sql = "SELECT * FROM users WHERE email='" . $email . "'";
            $result = $connection->query($sql);

            if ($result->num_rows <= 0) {
                $connection->close();
                return false;
            }

            $row = $result->fetch_assoc()[0];

            return password_verify($password, $row['password']);
        } else 
            $result = false;

        $connection->close();

        return false;
    }

    public function insert($password) {
        $result = false;

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $connection = $this->db_context->initialize_connection();
        if ($connection != NULL) {
            $this->id = guidv4();
            var_dump($this->name);
            var_dump($this->email);
            $escaped_name = $connection->real_escape_string($this->name);
            $escaped_email = $connection->real_escape_string($this->email);

            $sql = "INSERT INTO users (id, `name`, email, `password`) VALUES ('" . $this->id . "','" . $escaped_name  . "', '" . $escaped_email  . "', '" . $hash  . "')";
            if ($connection->query($sql) === TRUE)
                $result = true;
            else
                $result = false;            
        } else 
            $result = false;

        $connection->close();
        return $result;
    }
    
    /** Does not update password */
    public function update_changes() {
        $result = false;

        $connection = $this->db_context->initialize_connection();
        if ($connection != NULL) {

            $sql = "UPDATE users SET `name`='" . $escaped_name . "', email='" . $escaped_email . "' WHERE id='" . $this->id . "'";
            if ($connection->query($sql) === TRUE)
                $result = true;
            else
                $result = false;
        } else 
            $result = false;

        $connection->close();
        return $result;
    }

    public function update_password($password) {
        $result = false;

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $connection = $this->db_context->initialize_connection();
        if ($connection != NULL) {

            $sql = "UPDATE users SET `password`='" . $hash . "' WHERE id='" . $this->id . "'";
            if ($connection->query($sql) === TRUE)
                $result = true;
            else
                $result = false;
        } else 
            $result = false;

        $connection->close();
        return $result;
    }

    public function get_id() { return $this->id; }
    public function get_name() { return $this->name; }
    public function get_email() { return $this->email; }

    public function set_name($value) {  $this->name = $value; }
    public function set_email($value) { $this->email = $value; }
    
}

?>