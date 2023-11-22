<?php
$showAlert = false;  
$showError = false;  
$exists=false; 
    
if($_SERVER["REQUEST_METHOD"] == "POST") { 
       
    include '../database/db_connection.php';    
    
    $firstName = $_POST["firstName"];  
	$lastName = $_POST["lastName"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
    $password = $_POST["password"];  
    $cpassword = $_POST["cpassword"]; 
    
    $sql = "Select * from customer where email='$email'"; 
    
    $result = mysqli_query($mysqli, $sql); 
    
    $num = mysqli_num_rows($result);  
    
    // This sql query is use to check if 
    // the email is already present  
    // or not in our Database 
    if($num == 0) { 
        if(($password == $cpassword) && $exists==false) { 
    
            $hash = password_hash($password,  
                                PASSWORD_DEFAULT); 
                
            // Password Hashing is used here.  
            $sql = "INSERT INTO `customer` VALUES ('$firstName', '$lastName', '$email', '$address', '$phone', 1, '$hash');"; 
    
            $result = mysqli_query($mysqli, $sql); 
    
            if ($result) { 
                $showAlert = true;  
            } 
        }  
        else {  
            $showError = "Passwords do not match";  
        }       
    }// end if  
    
   if($num>0)  
   { 
      $exists="Email is already in use.";  
   }  
    
}//end if    
    
?> 

<!DOCTYPE HTML>
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
<?php 
    
    if($showAlert) { 
    
        echo ' <div class="alert alert-success  
            alert-dismissible fade show" role="alert"> 
    
            <strong>Success!</strong> Your account is  
            now created and you can login.  
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close">  
                <span aria-hidden="true">×</span>  
            </button>  
        </div> ';  
    } 
    
    if($showError) { 
    
        echo ' <div class="alert alert-danger  
            alert-dismissible fade show" role="alert">  
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close"> 
            <span aria-hidden="true">×</span>  
       </button>  
     </div> ';  
   } 
        
    if($exists) { 
        echo ' <div class="alert alert-danger  
            alert-dismissible fade show" role="alert"> 
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close">  
            <span aria-hidden="true">×</span>  
        </button> 
       </div> ';  
     } 
   
?> 
    <div class="wrapper">
        <form name = "SignUp" action = "Registration.php" method = "post">

            <div class="image">
                <img src="PawSalon.png" alt="Icon" class="Icon">
            </div>    

            <h1>Sign Up</h1>
         
			<div class="input-box">
                <div class="input-field">
                        <i class='bx bx-user'></i>
                        <input type="text" label for = "firstName" placeholder="First Name" required style="width: 475px; height: 25px;">
                        
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