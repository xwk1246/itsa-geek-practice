<?php
    $host = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $db = "practice";
    $connect = new mysqli($host, $dbuser, $dbpassword, $db);
    $connect->set_charset("utf8");
    if ($connect->connect_error) {
        die($connect->connect_error);
    }
