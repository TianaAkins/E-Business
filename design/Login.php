<?php
session_start();
include("../database/dbConfig.php");
include("../models/pet.php");
include("../models/customer.php");
include("../models/service.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email = test_input($_POST["email"]);
	$password = test_input($_POST["password"]);
    $invalidCredentials = false;
    $message = "";
	
    // Check if credentials are valid
	$stmt = "Select * from Customer where Email = '$email' and Password = '$password'";
	$result = $mysqli->query($stmt);
		
	if($result->num_rows > 0)
    {
         while($row = $result->fetch_assoc())
        {
    	    $_SESSION['first_name'] = $row["CustFirst"];
    	    $_SESSION['last_name'] = $row["CustLast"];
    	    $_SESSION['address'] = $row["Address"];
    	    $_SESSION['phone'] = $row["Phone"];
    	    $_SESSION['email'] = $row["Email"];
			$_SESSION['custID']=$row["CustomerID"];
        } 
		
		//Create customer model for session
		$customer = new Customer($_SESSION['custID'], $_SESSION['first_name'], $_SESSION['last_name'], $_SESSION['address'], $_SESSION['phone'], $_SESSION['email']);
		$_SESSION['customer']=$customer;
		
		//Query for pets associated with customer profile
		$sql = "Select * from pet where CustomerID = {$_SESSION['custID']}";
		$pet_result = $mysqli-> query($sql);
		$pets = mysqli_fetch_all($pet_result,MYSQLI_ASSOC);
		
		//Create array with pet models for session
		$pet_list=array();
		foreach($pets as $pet)
		{
			$current_pet = new Pet($pet["PetID"], $pet["PetName"], $pet["PetType"], $pet["Breed"], $pet["HairType"], $pet["Weight"], $_SESSION['customer']);
			$pet_list["{$current_pet->getName()}"] = $current_pet;
		} 
		$_SESSION['petList'] = $pet_list;
		
		//Query for all available services
		$service_sql = "Select * from service";
		$service_result = $mysqli-> query($service_sql);
		$services = mysqli_fetch_all($service_result,MYSQLI_ASSOC);
		
		//Create service model array
		$service_list=array();
		foreach($services as $service){
			$current_service = new Service($service["ServiceID"], $service["ServiceName"], $service["ServiceCost"]);
			$service_list["{$current_service->getName()}"] = $current_service;
		}
		$_SESSION['services']=$service_list;

		header("Location: customerprofile.php");
	}
	else {
        $invalidCredentials = true;
		$message = "Invalid email or password";
    }
	
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Registration_Login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form name = "Login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">


            <div class="image">
                <a href="Home.php">
                <img src="PawSalon.png" alt="Icon" class="Icon">
                </a>
            </div>   

            <h1>Login</h1>

            <div><?php if ($invalidCredentials) echo $message; ?></div>
            
            <div class="input-box">
                <div class="input-field">
                        <i class='bx bx-user'></i>
                        <input type="text" name="email" placeholder="Email" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <i class='bx bx-user'></i>
                        <input type="password" name="password" placeholder="Password" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>

            <br/>

            <button type="submit" name="submit" class="btn" style="margin-left:0px; width: 475px; height: 25px;">Login</button>
            <h2>Don't have an account?</h2>
            <h2> Click below to register.</h2>
            <button onclick="location.href='Registration.php'" type="submit" class="btn" style="margin-left:90px; width: 300px; height: 25px;">Register</button>

            
        </form>
    </div>
</body>
</html>