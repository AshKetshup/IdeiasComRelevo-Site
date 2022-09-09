<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage database
     * 
     * This file contains the basic methods to connect to the database
     * Version: 1.0.3
     * 
     * @developer Pedro Cavaleiro
     * @created Jan 11, 2022
     * @lastedit Aug 30, 2022
     * 
     * @issues no issues linked to this file
     * @todo no tasks pending
     * 
     */

    class DbContext {

        /** Db Credentials (dummy or empty for repo) */
        private $servername = "localhost";
        private $username = "ideiasc8_icr";
        private $password = "XqbWI)^S0n$p";
        private $database = "ideias_com_relevo";

        /**
         * Opens the database connection
         * returns the connection if no errors connecting, NULL if there was some error connecting
         */
        public function initialize_connection() {
            $connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
            if ($connection->connect_error)
                return NULL;
            else
                return $connection;
        }

        /**
         * Usefull to debug connection errors to the database
         * Returns true if there was no error connecting to the database otherwise returns the error
         */
        public function test_connection() {
            $connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
            
            $result = false;
            if ($connection->connect_error)
                $result = $connection->connect_error;
            else
                $result = true;

            $connection->close();

            return $result;
        }

        public function close_connection() { }
    }

?>