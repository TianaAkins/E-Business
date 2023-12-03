<?php
    session_start();
	include("../database/dbConfig.php");
	
	$sql = "Select PetName, PetType, Breed, HairType from pet where CustomerID = $_SESSION['custID']";
	$all_pets = $mysqli-> query($sql);
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$petName = test_input($_POST['petName']);
		$petType = test_input($_POST['petType']);
		$breed = test_input($_POST['breed']);
		$hairType = test_input($_POST['hairType']);
		$weight = test_input($_POST['weight']);
		$customerID = $_SESSION['custID'];
	
		$stmt = $mysqli->prepare("insert into pet(PetName, PetType, Breed, HairType, Weight, CustomerID)
			values(?,?,?,?,?,?)");
		$stmt->bind_param("ssssii", $petName, $petType, $breed, $hairType, $weight, $customerID);
		$stmt->execute();
		$stmt->close();
	}
	
	function test_input($data) 	
	{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
	}
	
	function get_id($email)
	{
		
		include("../database/dbConfig.php");
		
		$sql= "select CustomerID from customer where email='$email'";
		$result = $mysqli-> query($sql);
		$row = $result->fetch_assoc();
		return $row["CustomerID"];
	}

?>
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
		<form name = "addPet" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h3>Add Pet Profile</h3>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" name="petName" placeholder="Pet Name" required style="width: 475px; height: 25px;"> 
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" name="petType" placeholder="Pet Type" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" name ="breed" placeholder="Breed" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" name="hairType" placeholder="Hair Type" required style="width: 475px; height: 25px;"> 
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <input type="text" name="weight" placeholder="Weight" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <br/>
            <button type="submit" class="btn" style="margin-left:37px; width: 475px; height: 25px;">Add</button>
		</form>
        </div>
        <hr>
        <div class="wrapper2">
            <h3><label for="Pet">Select Pet: </label>
                <select name="Pets" id="Pets">
                   <?php 
					while ($pet = mysqli_fetch_array($all_pets,MYSQLI_ASSOC)):; 
					?>
						<option value="<?php echo $pet["PetName"];?>">
						<?php echo $category["Category_Name"];?>
						</option>
						<?php 
						endwhile; 
						?>
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

	