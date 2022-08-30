<?php

    class UserManagement {

        /** Constructor, nothing else to initialize */
        function __construct() { }

        /**
         * Attempts to login the user, if the login is successful it sets the session
         * with the uid, name and email
         * @param String $email the email from the user
         * @param String $password the password from the user
         * 
         * @return bool if the login was successful or not
         */
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

        /**
         * Creates a new user with a name, email and password
         * @param String $name the new user's name
         * @param String $email the new user's email
         * @param String $password the new user's password in plaintext
         * 
         * @return UserEntity the new user entity
         */
        public function create_user($name, $email, $password) {            
            $userEntity = new UserEntity();
            $userEntity->set_name($name);
            $userEntity->set_email($email);
            return $userEntity->insert($password);
        }

    }

?>