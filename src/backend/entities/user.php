<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage entities
     * 
     * This file contains the User entity class which maps the table to a PHP class
     * Version: 1.0.5
     * 
     * @developer Pedro Cavaleiro
     * @created Jan 12, 2022
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

    class UserEntity {

        /** Entity Variables */
        private $id;
        private $name;
        private $email;

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
            $this->name = $entry['name'];
            $this->email = $entry['email'];
        }

        /**
         * Attempts to login a user
         * @param String $email the email for witch to attempt the login
         * @param String $password the password to check against
         * 
         * @return UserEntity|bool if the login is successfull it returns the UserEntity corresponding to the user otherwise returns false
         */
        public static function attempt_login($email, $password) {
            $result = false;
            $db_context = new DbContext();
            $connection = $db_context->initialize_connection();
            if ($connection != NULL) {         
                $escaped_email = $connection->real_escape_string($email);   
                $sql = "SELECT * FROM users WHERE email='" . $email . "'";
                $result = $connection->query($sql);

                if ($result->num_rows <= 0) {
                    $connection->close();
                    return false;
                }

                $row = $result->fetch_assoc();

                if (password_verify($password, $row['password'])) {
                    return UserEntity::fromRow($row);
                }
                return false;
            } else 
                $result = false;

            $connection->close();

            return false;
        }

        /**
         * Creates a new user with the given password
         * @param String $password the password to set for the new user
         * 
         * @return bool wether the user was created or not
         */
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
        
        /** 
         * Updates the user with the exception of the password
         * @return bool wether the user was updated or not
         */
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

        /**
         * Only updates the password of the user
         * @param String $password the new password to set to the user
         * 
         * @return bool wether the password was updated successfully or not
         */
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

        /* GETTERS */
        public function get_id() { return $this->id; }
        public function get_name() { return $this->name; }
        public function get_email() { return $this->email; }

        /* SETTERS */
        public function set_name($value) {  $this->name = $value; }
        public function set_email($value) { $this->email = $value; }
        
    }

?>