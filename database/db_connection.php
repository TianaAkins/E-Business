<?php

$host = "localhost";
$dbname = "pawsalon";
$username = "root";
$password = "root";


$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection Error: " . $mysqli->connect_error);
}
  
return $mysqli;
?>