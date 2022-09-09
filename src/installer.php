<?php

    $servername = "localhost";
    $username = "ideiasc8_icr";
    $password = "o6WsrKas";

    $db = new PDO("mysql:host=$servername", $username, $password);

    $query = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/backend/ideias_com_relevo.sql");

    $stmt = $db->prepare($query);

    $stmt->execute();

    unlink("installer.php");

    header("Location: /");
?>