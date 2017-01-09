<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "gerencia";
$con = new mysqli($host, $user, $password, $db);
$con->query("SET NAMES 'utf8'");
?>