<?php

$first = $last = $address = $phone = $email = $password = $password_confirmation = "";
$pwMatchError = ""; $pwDontMatch = false;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $first = test_input($_POST["first"]);
    $last = test_input($_POST["last"]);
    $address = test_input($_POST["address"]);
    $phone = test_input($_POST["phone"]);
    $email = test_input($_POST["email"]);    
    $password = test_input($_POST["password"]);   
    $password_confirmation = test_input($_POST["password_confirmation"]);

    // if passwords match then create new account
    if(pwdMatch($password, $password_confirmation))
    {
         // DB connection
        $host = "localhost";
        $dbname = "PawSalon";
        $username = "root";
        $pw = "root";

        $mysqli = new mysqli($host, $username, $pw, $dbname);

        if ($mysqli->connect_error) {
            die("Connection Error: " . $mysqli->connect_error);
        }

        $stmt = $mysqli->prepare("INSERT INTO Customer (CustFirst, CustLast, Email, Address, Phone, Active, Password)
                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssis", $CustFirst, $CustLast, $Email, $Address, $Phone, $Active, $Password);

        $CustFirst = $first;
        $CustLast = $last;
        $Email = $email;
        $Address = $address;
        $Phone = $phone;
        $Active = 1;
        $Password = $password;
        $stmt->execute();

        $stmt->close();
        $mysqli->close();

        // Redirect to Login    
    }
    // else passwords didn't match and send back form 
    else 
    {        
        $first = $_POST["first"];
        $last = $_POST["last"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $pwMatchError = "Passwords don't match";
        $pwDontMatch = true;
    }   
}

function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function pwdMatch($password, $password_confirmation) 
{
    $result = true;
    if ($password !== $password_confirmation)
    {
        $result = false;
    }
    return $result;
}
?>

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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="image">
                <img src="PawSalon.png" alt="Icon" class="Icon">
            </div>    
            <h1>Sign Up</h1>

            <div class="input-box">
                <div class="input-field">
                    <i class='bx bx-user'></i>
                    <input type="text" name="first" placeholder="First Name" value="<?php if($pwDontMatch) echo $first;?>" required style="width: 475px; height: 25px;">                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <i class='bx bx-user'></i>
                    <input type="text" name="last" placeholder="Last Name" value="<?php if($pwDontMatch) echo $last;?>" required style="width: 475px; height: 25px;">                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <i class='bx bxs-building-house' ></i>
                    <input type="text" name="address" placeholder="Address" value="<?php if($pwDontMatch) echo $address;?>" required style="width: 475px; height: 25px;">                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <i class='bx bx-phone' ></i>
                    <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php if($pwDontMatch) echo $phone;?>" placeholder="Phone 888-888-8888" required style="width: 475px; height: 25px;"> 
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <i class='bx bxs-envelope' ></i>
                    <input type="email" name="email" placeholder="Email" value="<?php if($pwDontMatch) echo $email;?>" required style="width: 475px; height: 25px;">                        
                </div>
            </div>
            <div> <?php echo $pwMatchError; ?> </div>
            <div class="input-box">
                <div class="input-field">                    
                    <i class='bx bxs-lock-alt' ></i>                    
                    <input type="password" name="password" placeholder="Password" required style="width: 475px; height: 25px;">
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <i class='bx bxs-lock-alt' ></i>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required style="width: 475px; height: 25px;">               
                </div>
            </div>
            <br/>

            <button type="submit" name="submit" class="btn" style="margin-left:0px; width: 475px; height: 25px;">Complete Registration</button>
            <br/>
            <h2>Already have an account?</h2>
            <h2> Click below to login.</h2>                        
        </form>
        <button onclick="location.href='Login.php'" class="btn" style="margin-left:90px; width: 300px; height: 25px;">Login</button>
    </div>    
</body>
</html>