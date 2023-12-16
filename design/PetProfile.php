<?php
    session_start();
	include("../database/dbConfig.php");
	include("../models/pet.php");

	//Reroutes user to login if not logged in.
	if($_SESSION['first_name'] == "")
	{
    	header("Location: Login.php");
	}
	
	$sql = "Select PetID, PetName, PetType, Breed, HairType, Weight, CustomerID from pet where CustomerID = {$_SESSION['custID']}";
	$result = $mysqli-> query($sql);
	$pets = mysqli_fetch_all($result,MYSQLI_ASSOC);
	$pet_selected=false;
	
	$pet_list=array();
	foreach($pets as $pet)
	{
		$current_pet = new Pet($pet["PetID"], $pet["PetName"], $pet["PetType"], $pet["Breed"], $pet["HairType"], $pet["Weight"], $pet["CustomerID"]);
		$pet_list["{$current_pet->getName()}"] = $current_pet;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_pet']))
	{
		$selectedKey = $_POST['selected_pet']; 
		$selectedPet=$pet_list["{$selectedKey}"];
		$pet_selected=true;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST" && formComplete()) {
		
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
	
	function formComplete()
	{
		$complete=false;
		if(isset($_POST['petName']) && isset($_POST['petType']) && isset($_POST['breed']) 
			&& isset($_POST['hairType']) && isset($_POST['weight']))
			{
				$complete=true;
			}
		return $complete;
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
			<a href="Home.php">
            <img src="images/PawSalonIcon.png" class="rounded-circle" width="150">
            <img src="images/PawSalon.png" class="rounded-circle" width="350">
            </a>
            <h1>Pet Profile</h1>
            <div class="topbar">
                <h2>Customer Support: 254-323-3421</h2>
                <a href="logout.php">Login/Logout</a>
                <a href="Contact.php">Contact Us</a>
                <a href="Gallery.php">Gallery</a>
                <a href="Appointments.php">Appointments</a>
                <a href="Services.php">Services</a>
                <a href="PetProfile.php">Pet Profile</a>
                <a href="CustomerProfile.php">Customer Profile</a>
                <a href="Home.php">Home</a>
            </div>
            <hr>
        </div>
        <div class="wrapper">
		<form name="addPet" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
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
		<form name="selectPet" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" >
            <h3><label for="Pet">Select Pet: </label>
                <select name="selected_pet">
                   <?php 
					foreach($pet_list as $pet): 
					?>
						<option value="<?php echo $pet->getName(); ?>">
						<?php echo $pet->getName();?>
						</option>
						<?php endforeach;?>
                </select>
            </h3>
            <button type="submit"  value="Submit" style="margin-left: 250px; margin-bottom: 10px;" >Submit</button>
		</form>
			<table>
				<tr>
					<th>Pet Name</th>
					<td><?php if($pet_selected) {echo $selectedPet->getName();} ?></td>
				</tr>
				<tr>
					<th>Pet Type</th>
					<td><?php if($pet_selected) {echo $selectedPet->getPetType();} ?></td>
				</tr>
				<tr>
					<th>Breed</th>
					<td><?php if($pet_selected) {echo $selectedPet->getBreed();} ?></td>
				</tr>
				<tr>
					<th>Hair Type</th>
					<td><?php if($pet_selected) {echo $selectedPet->getHairType();} ?></td>
				</tr>
				<tr>
					<th>Weight</th>
					<td><?php if($pet_selected) {echo $selectedPet->getWeight();} ?></td>
				</tr>
			</table>
        </div>
    </div>
</body>
</html>
	