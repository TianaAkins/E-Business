<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Gallery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Contact Us</title>
</head>
<body>
    <div class="container">
        <div class="main">
            <a href="Home.php">
            <img src="PawSalonIcon.png" class="rounded-circle" width="150">
            <img src="PawSalon.png" class="rounded-circle" width="350">
            </a>
            <h1>Contact Us</h1>
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
    </div>

    <center>
        <div class="wrapper">
            <h3><i style="font-size:24px" class="fa">&#xf1b0;</i>Submit all questions, comments, or reviews below.<i style="font-size:24px" class="fa">&#xf1b0;</i></h3>
            <br/>
            <h4> If you need immediate service, please contact our front desk at 254-323-3400 </h4>


            <form id="custreview">
                <div class="input-box">
                    <div class="input-field">
                            <i class='bx bx-user'></i>
                            <input type="text" placeholder="Name" required style="width: 475px; height: 25px;">
                            
                    </div>
                </div>
                <br/>
    
                <div class="input-box">
                    <div class="input-field">
                            <i class='bx bx-phone' ></i>
                            <input type="text" placeholder="Phone 888-888-8888" required style="width: 475px; height: 25px;"> 
                    </div>
                </div>
    
                <br/>
    
                <textarea rows="4" cols="50" name="comment" form="usrform">
                Share your experience </textarea>
                <br/>

                <button type="submit" class="btn" style="margin-left:27px; width: 200px; height: 40px;">Submit</button>


            </form>
            



        </div>
    </center>
</body>
</html>