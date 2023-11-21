<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Registration_Login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form name = "SignUp">

            <div class="image">
                <img src="PawSalon.png" alt="Icon" class="Icon">
            </div>    

            <h1>Sign Up</h1>
            
            <div class="input-box">
                <div class="input-field">
                        <i class='bx bx-user'></i>
                        <input type="text" placeholder="First Name" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <i class='bx bx-user'></i>
                        <input type="text" placeholder="Last Name" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <i class='bx bxs-building-house' ></i>
                        <input type="text" placeholder="Address" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <i class='bx bx-phone' ></i>
                        <input type="text" placeholder="Phone 888-888-8888" required style="width: 475px; height: 25px;"> 
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <i class='bx bxs-envelope' ></i>
                        <input type="text" placeholder="Email" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <i class='bx bxs-lock-alt' ></i>
                        <input type="text" placeholder="Password" required style="width: 475px; height: 25px;">
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <i class='bx bxs-lock-alt' ></i>
                        <input type="text" placeholder="Confirm Password" required style="width: 475px; height: 25px;">               
                </div>
            </div>
            <br/>

            <button type="submit" class="btn" style="margin-left:0px; width: 475px; height: 25px;">Complete Registration</button>
            <br/>
            <h2>Already have an account?</h2>
            <h2> Click below to login.</h2>
            <button onclick="location.href='login.html'" type="submit" class="btn" style="margin-left:90px; width: 300px; height: 25px;">Login</button>
            
        </form>
    </div>
</body>
</html>



//code has been moved from signup.php and customerController.php files in case 
//it provides any use still. Remove if unnecessary
<?php

    private function emptyInput()
    {
        $result;
        if (empty($this->$name) ||
            empty($this->$email) ||
            empty($this->$phone) ||
            empty($this->$address) ||
            empty($this->$password) ||
            empty($this->$password_confirmation)) 
        {
            $result = false; 
        } 
        else 
        {
            $result = true;
        }
        return $result;        
    }

    private function invalidCharacters($input)
    {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $input)) {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }
    
    private function invalidEmail()
    {
        $result;
        if (!filter_var($this->$email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch() 
    {
        $result;
        if ($this->$password !== $this->$password_confirmation)
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

}

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