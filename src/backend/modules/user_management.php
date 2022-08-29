<?php

    class UserManagement {

        function __construct() { }

        public function login($email, $password) {            
            $result = UserEntity::attempt_login($email, $password);
            if ($result != false) {                
                $_SESSION["loggedin"] = true;
                $_SESSION["uid"] = $result->get_id();
                $_SESSION["name"] = $result->get_name();
                $_SESSION["email"] = $result->get_email();
                return true;
            }
            return false;
        }

        public function create_user($name, $email, $password) {            
            $userEntity = new UserEntity();
            $userEntity->set_name($name);
            $userEntity->set_email($email);
            return $userEntity->insert($password);
        }

    }

?>