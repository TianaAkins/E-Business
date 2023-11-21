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

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
}

function emptyInput()
{
    $result = false;
    if (empty($this->name) ||
        empty($this->email) ||
        empty($this->phone) ||
        empty($this->address) ||
        empty($this->password) ||
        empty($this->password_confirmation)) 
    {
        $result = true; 
    }         
    return $result;        
}

function invalidCharacters($input)
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

function invalidEmail()
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

function pwdMatch() 
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


?>