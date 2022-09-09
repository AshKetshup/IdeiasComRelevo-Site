<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage helpers
     * 
     * This file contains the helpers for the whole app
     * Version: 1.0.0
     * 
     * @developer Pedro Cavaleiro
     * @created Jan 12, 2022
     * @lastedit Jan 12, 2022
     * 
     * @issues no issues linked to this file
     * @todo no tasks pending
     * 
     */

    function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

?>