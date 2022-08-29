<?php

    class ContactManagement {

        function __construct() { }

        public function update_contacts($name, $email, $password) {            
            $userEntity = new UserEntity();
            $userEntity->set_name($name);
            $userEntity->set_email($email);
            return $userEntity->insert($password);
        }

        public function get_contacts() {            
            $office = ContactsEntity::fromType('office')->get_value();
            $phone = ContactsEntity::fromType('phone')->get_value();
            $email = ContactsEntity::fromType('email')->get_value();
            return array(
                "office" => $office,
                "phone" => $phone,
                "email" => $email
            );
        }

    }

?>