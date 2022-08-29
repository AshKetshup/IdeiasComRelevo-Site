<?php

    class UserManagement {

        function __construct() { }

        public function login($email, $password) {            
            return UserEntity::attempt_login($email, $password);
        }

        public function create_user($name, $email, $password) {            
            $userEntity = new UserEntity();
            $userEntity->set_name($name);
            $userEntity->set_email($email);
            return $userEntity->insert($password);
        }

    }

?>