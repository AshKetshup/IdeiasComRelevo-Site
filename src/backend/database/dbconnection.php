<?php

class DbContext {

    /** Db Credentials (dummy or empty for repo) */
    private $servername = "";
    private $username = "";
    private $password = "";
    private $database = "";

    /**
     * Opens the database connection
     * returns the connection if no errors connecting, NULL if there was some error connecting
     */
    public function initialize_connection() {
        $connection = new mysqli($servername, $username, $password, $database);
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
        $connection = new mysqli($servername, $username, $password, $database);
        
        $result = false;
        if ($connection->connect_error)
            $result = $connection->connect_error;
        else
            $result = true;

        $connection->close();

        return $result;
    }

    public function close_connection() {

    }
}

?>