<?php

    class UserManagement {

        function __construct() { }

        public function Login($email, $password) {            
            return UserEntity::attempt_login($email, $password);
        }

    }

?>