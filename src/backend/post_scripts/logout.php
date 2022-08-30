<?php

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