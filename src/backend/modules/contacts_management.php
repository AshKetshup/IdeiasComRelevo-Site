<?php

    class ContactManagement {

        function __construct() { }

        public function update_contacts($phone, $email, $office) {            
            $_office = ContactsEntity::fromType('office');
            $_phone = ContactsEntity::fromType('phone');
            $_email = ContactsEntity::fromType('email');

            $_office->set_value($office);
            $_phone->set_value($phone);
            $_email->set_value($email);

            $_office->update_changes();
            $_phone->update_changes();
            $_email->update_changes();
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