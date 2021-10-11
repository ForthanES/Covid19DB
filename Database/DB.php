<?php

use Database\DBconexion;

if (!isset($_SESSION['db'])) {
    $db = "covid19";
    @$conn = new mysqli('localhost', 'root', '');
    $error = $conn->connect_errno;
    if ($error != null) {
        $msg = "<p>Error $error conectando a la base de datos: $conn->connect_error</p>";
        exit();
    }
    $sql = 'SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = "' . $db . '"';
    $res = $conn->query($sql);
    $rows = $conn->affected_rows;
    if ($rows == 0) {
        $sql = 'CREATE DATABASE ' . $db;
        $conn->query($sql);
    }
    $_SESSION['db'] = $db;
    $conn->close();
}

if (!isset($_SESSION['tablas'])) {
    require 'DBtables.php';
} else {

    $conn = DBconexion::connect();
    $data = $conn->query("SHOW TABLES");
    $rows = $conn->affected_rows;
    if ($rows !== 3) {
        require 'DBtables.php';
    }
}
