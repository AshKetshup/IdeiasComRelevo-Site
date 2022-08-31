<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage post_scripts
     * 
     * Handles a post sent from the frontend to logout
     * Version: 1.0.0
     * 
     * @developer Pedro Cavaleiro
     * @created Aug 29, 2022
     * @lastedit Aug 29, 2022
     * 
     * @issues no issues linked to this file
     * @todo no tasks pending
     * 
     */

    // starts the php session
    session_start();

    // unsets the session values
    $_SESSION['uid'] = NULL;
    $_SESSION['loggedin'] = false;
    $_SESSION['email'] = NULL;
    $_SESSION['name'] = NULL;

    // destroys the php session
    session_destroy();

    // redirects to the login page
    header("Location: /admin/login")

?>