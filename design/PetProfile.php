<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PetProfile.css">
    <title>Pet Profile</title>
</head>
<body>
    <div class="container">
        <div class="main">
            <img src="PawSalonIcon.png" class="rounded-circle" width="150">
            <img src="PawSalon.png" class="rounded-circle" width="350">
            <h1>Pet Profile</h1>
            <div class="topbar">
                <h2>Customer Support: 254-323-3421</h2>
                <a href="Home.php">Logout</a>
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
            <h3>Add Pet Profile</h3>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" placeholder="Pet Name" required style="width: 475px; height: 25px;"> 
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" placeholder="Pet Type" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" placeholder="Breed" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" placeholder="Hair Type" required style="width: 475px; height: 25px;"> 
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" placeholder="Weight" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <br/>
            <button type="submit" class="btn" style="margin-left:37px; width: 475px; height: 25px;">Add</button>
        </div>
        <hr>
        <div class="wrapper2">
            <h3><label for="Pet">Select Pet: </label>
                <select name="Pets" id="Pets">
                  <option value="Max">Max</option>
                  <option value="Sally">Sally</option>
                </select>
            </h3>
            <input type="submit" value="Submit" style="margin-left: 250px; margin-bottom: 10px;" >
            <table>
                <tr>
                  <th>Pet Name</th>
                  <td>Max</td>
                </tr>
                <tr>
                  <th>Pet Type</th>
                  <td>Dog</td>
                </tr>
                <tr>
                  <th>Breed</th>
                  <td>Pitbull</td>
                </tr>
                <tr>
                    <th>Hair Type</th>
                    <td>Short</td>
                </tr>
                <tr>
                    <th>Weight</th>
                    <td>40 lbs.</td>
                </tr>
              </table>
        </div>    
    </div>
</body>
</html>

//code moved from pet model in case it is still helpful
//Remove if unnecessary
<?php
	$servername = "localhost";
	$username = "root";
	$dbpassword = "root";
	$database = "pawsalon"

	$CustomerID = $_POST['CustomerID'];
	$PetNum = $_POST['PetNum'];
	$PetName = $_POST['PetName'];
	$PetType = $_POST['PetType'];
	$Breed = $_POST['Breed'];
	$HairType = $_POST['HairType'];
	$Weight = $_POST['Weight'];

	//database connection
	$conn = new mysqli($servername, $username, $dbpassword, $database);
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into pet(CustomerID, PetNum, PetName, PetType, Breed, HairType, Weight)
			values(?,?,?,?,?,?,?)");
		$stmt->bind_param("iissssi", $CustomerID, $PetNum, $PetName, $PetType, $Breed, $HairType, $Weight);
		$stmt->execute();
		echo "Profile Updated";
		$stmt->close();
		$conn->close();
	}

	
	
?>