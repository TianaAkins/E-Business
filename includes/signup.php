<?php

if(isset($_POST["submit "])) {

    // Grabbing the data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $password_confirmation = $_POST["password_confirmation"];
    
    // Instantiate CustomerController class
    include "../constrollers/CustomerController.php";
    $new_customer = new CustomerController($name, $email, $phone, $address, $password, $password_confirmation);


    // Running error handlers and signup


    // Going back to front page

}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__."../db_connection.php";

// $sql = "INSERT INTO user (name, email, password_hash)
//         VALUES (?, ?, ?)";

// $stmt = $mysqli->stmt_init();

print_r($_POST);
// var_dump($password_hash);

?> 