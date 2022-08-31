<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage modules
     * 
     * Contains all the methods to handle the Contacts entities
     * Version: 1.0.1
     * 
     * @developer Pedro Cavaleiro
     * @created Aug 29, 2022
     * @lastedit Aug 30, 2022
     * 
     * @issues no issues linked to this file
     * @todo no tasks pending
     * 
     */

    class ContactManagement {

        /** Constructor, nothing else to initialize */
        function __construct() { }

        /**
         * Updates the contacts, there are only 3 types of contacts, office, phone and email
         * @param $phone the phone number as a string
         * @param $email the email as a string
         * @param $office the office address as a string
         */
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

        /**
         * Gets all the contacts from the database
         */
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