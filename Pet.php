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
	$conn = new mysqli_connect($servername, $username, $dbpassword, $database);
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