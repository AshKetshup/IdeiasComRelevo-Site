<?php

    class UserManagement {

        function __construct() { }

        public function Login($email, $password) {            
            return UserEntity::attempt_login($email, $password);
        }

        public function CreateUser($name, $email, $password) {            
            $userEntity = new UserEntity();
            $userEntity->set_name($name);
            $userEntity->set_email($email);
            
        }

    }

?>