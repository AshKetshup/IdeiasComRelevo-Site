<?php

    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();

    echo "DUMPING POST<br />";
    var_dump($_POST);

    // Takes raw data from the request
    $json = file_get_contents('php://input');
    echo "<br /><br />DUMPING RAW JSON<br />";
    var_dump($json);

    // Converts it into a PHP object
    $data = json_decode($json);
    echo "<br /><br />DUMPING JSON OBJECT<br />";
    var_dump($data);

?>