<?php
session_start();

//Reroutes user to login if not logged in.
if($_SESSION['first_name'] == "")
{
    header("Location: Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Appointments.css">
    <title>Appointments</title>
</head>
<body>
    <div class="container">
    <div class="main">
            <a href="Home.php">
            <img src="PawSalonIcon.png" class="rounded-circle" width="150">
            <img src="PawSalon.png" class="rounded-circle" width="350">
            </a>
            <h1>Appointments</h1>
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
        <div class="wrapper">
            <h3>Book Appointment</h3>
            <h3><label for="Pet">Select Pet: </label>
                <select name="Pets" id="Pets">
                  <option value="Max">Max</option>
                  <option value="Sally">Sally</option>
                </select>
            </h3>
            <center>
            <div class="input-field">
                <input type="date" placeholder="Date" required style="width: 475px; height: 25px;">
                
            </div>
            <br/>

            <div class="input-field">
                <input type="time" placeholder="Time" required style="width: 475px; height: 25px;">
                
            </div>
            <br/>
            <b><label for="Service">Select Service: </label></b>
                <select name="Service" id="Service">
                  <option value="Nail Trim">Nail Trim - $25</option>
                  <option value="Haircut">Haircut - $50</option>
                  <option value="Bath and Brush">Bath & Brush - $75</option>
                  <option value="Full Service">Full Service Package - $90</option>
                </select>

            </center>



            
            <br/>
            <button type="submit" class="btn" style="margin-left:37px; width: 475px; height: 25px;">BOOK!</button>
        </div>   
        <hr>
        <div class="wrapper2">
            
            <center>
                <h3>Past Appointments</h3>
                <table>
                <tr>
                  <th>Appointment ID</th>
                  <td>100</td>
                </tr>
                <tr>
                  <th>Pet Name</th>
                  <td>Sally</td>
                </tr>
                <tr>
                  <th>Date</th>
                  <td>11/28/2023</td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td>9:00AM</td>
                </tr>
                <tr>
                    <th>Service</th>
                    <td>Bath & Brush</td>
                </tr>
                <tr>
                    <th>Cost</th>
                    <td>$75.00</td>
                </tr>
                <tr>
                    <th>Payment Status</th>
                    <td>Complete</td>
                </tr>
              </table>
              <br/>
              <hr>
              <br/>
              <table>
                <tr>
                  <th>Appointment ID</th>
                  <td>200</td>
                </tr>
                <tr>
                  <th>Pet Name</th>
                  <td>Max</td>
                </tr>
                <tr>
                  <th>Date</th>
                  <td>11/28/2023</td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td>9:30AM</td>
                </tr>
                <tr>
                    <th>Service</th>
                    <td>Haircut</td>
                </tr>
                <tr>
                    <th>Cost</th>
                    <td>$50.00</td>
                </tr>
                <tr>
                    <th>Payment Status</th>
                    <td>Complete</td>
                </tr>
              </table>


            </center>
        </div>

        
    </div>
</body>
</html>