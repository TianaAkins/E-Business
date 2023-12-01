<?php
    session_start();
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
            <h3>Update Customer Profile</h3>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" placeholder="First Name" required style="width: 475px; height: 25px;"> 
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" placeholder="Last Name" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" placeholder="Address" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" placeholder="Phone 888-888-8888" required style="width: 475px; height: 25px;"> 
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" placeholder="Email" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <br/>
            <button type="submit" class="btn" style="margin-left:37px; width: 475px; height: 25px;">Update</button>
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
