<?php
ob_start();
session_start();
include("../database/dbConfig.php");

//Fill variables with session info and determine CustomerID.
$first = $_SESSION['first_name'];
$last = $_SESSION['last_name'];
$address = $_SESSION['address'];
$phone = $_SESSION['phone'];
$email = $_SESSION['email'];
$stmt = "SELECT CustomerID FROM Customer WHERE CustFirst = '$first' AND CustLast = '$last' AND Address = '$address' AND Phone = '$phone' AND Email = '$email'";
$result = $mysqli->query($stmt);

while($row = $result->fetch_assoc())
{
    $customerID = $row["CustomerID"];
}

//Update database and session with user-input info, then reload page.  
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $first = test_input($_POST["first"]);
    $last = test_input($_POST["last"]);
    $address = test_input($_POST["address"]);
    $phone = test_input($_POST["phone"]);
    $email = test_input($_POST["email"]);
    
    $stmt = "UPDATE Customer SET CustFirst = '$first', CustLast = '$last', Address = '$address', Phone = '$phone', Email = '$email' WHERE CustomerID = '$customerID'";
    $mysqli->query($stmt);

    $_SESSION['first_name'] = $first;
    $_SESSION['last_name'] = $last;
    $_SESSION['address'] = $address;
    $_SESSION['phone'] = $phone;
    $_SESSION['email'] = $email;
    
    header("Location: CustomerProfile.php");
}

function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CustomerProfile.css">
    <title>Customer Profile</title>
</head>
<body>
    <div class="container">
        <div class="main">
            <img src="PawSalonIcon.png" class="rounded-circle" width="150">
            <img src="PawSalon.png" class="rounded-circle" width="350">
            <h1>Welcome <?php echo $login_session; ?></h1>
            <div class="topbar">
                <h2>Hello <?php echo $_SESSION['first_name'] ?></h2>
                <a href="logout.php">Logout</a>
                <a href="Contact.php">Contact Us</a>
                <a href="Gallery.php">Gallery</a>
                <a href="Appointments.php">Appointments</a>
                <a href="Services.php">Services</a>
                <a href="PetProfile.php">Pet Profile</a>
                <a href="CustomerProfile.php">Customer Profile</a>
            </div>
            <hr>
        </div>
        <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <h3>Update Customer Profile</h3>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" name="first" placeholder="First Name" required style="width: 475px; height: 25px;"> 
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" name="last" placeholder="Last Name" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" name="address" placeholder="Address" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" name="phone" placeholder="Phone 888-888-8888" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="xxx-xxx-xxxx" required style="width: 475px; height: 25px;"> 
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" name="email" placeholder="Email" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <br/>
            <button type="submit" class="btn" name="submit" style="margin-left:37px; width: 475px; height: 25px;">Update</button>
        </form>
        </div>   
        <hr>
        <div class="wrapper2">
            <h3>Account Information</h3>
            <table>
                <tr>
                  <th>First Name</th>
                  <td><?php echo $_SESSION['first_name']; ?></td>
                </tr>
                <tr>
                  <th>Last Name</th>
                  <td><?php echo $_SESSION['last_name']; ?></td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td><?php echo $_SESSION['address']; ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?php echo $_SESSION['phone']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $_SESSION['email']; ?></td>
                </tr>
              </table>
        </div> 
    </div>
</body>
</html>
