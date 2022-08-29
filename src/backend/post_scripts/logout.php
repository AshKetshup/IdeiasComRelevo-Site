<?php

    session_start();
    
    $_SESSION['uid'] = NULL;
    $_SESSION['loggedin'] = false;
    $_SESSION['email'] = NULL;
    $_SESSION['name'] = NULL;

    session_destroy();

    header("Location: /admin/login")

?>