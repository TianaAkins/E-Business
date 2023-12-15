<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <div class="main">
            <a href="Home.php">
            <img src="images/PawSalonIcon.png" class="rounded-circle" width="150">
            <img src="images/PawSalon.png" class="rounded-circle" width="350">
            </a>
            <h1>Home</h1>
            <div class="topbar">
                <h2>Customer Support: 254-323-3421</h2>
                <a href="logout.php">Login/Logout</a>
                <a href="Contact.php">Contact Us</a>
                <a href="Gallery.php">Gallery</a>
                <a href="Appointments.php">Appointments</a>
                <a href="Services.php">Services</a>
                <a href="PetProfile.php">Pet Profile</a>
                <a href="CustomerProfile.php">Customer Profile</a>
            </div>
            <hr>
        </div>
        <center>
            <div class="wrapper3">
                <h3>Welcome to The Paw Salon</h3>
                <h4> The Paw Salon is a friendly grooming business ready to take care of your special family members.
                    We offer many services including baths, haircuts, and even packaged deals! </h4>
                <h4> Follow the links below to access your personal account to create pet profiles, view services, and book appointmets. </h4>
                <h3> <i style="font-size:24px" class="fa">&#xf1b0;</i>     Come Join the Family!    <i style="font-size:24px" class="fa">&#xf1b0;</i></h3>

            </div>
        </center>

        <center>   
        <img src="images/home1.jpg" width="350" height="350" style="border-radius: 25px; ">
        <img src="images/home2.jpg" width="350" height="350" style="border-radius: 25px;">  
        <img src="images/home3.jpg" width="350" height="350" style="border-radius: 25px;">  
        <img src="images/home4.jpg" width="350" height="350" style="border-radius: 25px;">   
        <hr>
        </center>

        <center>
        <div class="wrapper2">
            <h3> Click Below To Register</h3>
            <button onclick="location.href='Registration.php'" type="submit" class="btn" style="margin-left:27px; width: 300px; height: 60px;">Register</button>
            <br/> 
            <h3> Click Below To Login</h3>
            <button onclick="location.href='Login.php'" type="submit" class="btn" style="margin-left:27px; width: 300px; height: 60px;">Login</button>
        </div>
        </center>

    </div>
</body>
</html>