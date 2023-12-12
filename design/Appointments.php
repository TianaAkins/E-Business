<?php
session_start();
include("../database/dbConfig.php");
include("../models/pet.php");
include("../models/customer.php");
include("../models/appointment.php");
include("../models/service.php");

$pet_list = getPetList();
$service_list = getServiceList();

if($_SERVER["REQUEST_METHOD"] == "POST" && formComplete())
{
	$selected_pet = $_POST['pet_name'];
	$selected_date = $_POST['date'];
    $selected_time = $_POST['time'];
    $selected_service = $_POST['service'];
	
	if (date_available($selected_date, $selected_time)){                                            
		
		$custID = $_SESSION['custID'];
		$petID = $pet_list["{$selected_pet}"]->getID();
		$serviceID=$service_list["{$selected_service}"]->getID();
		$appt_date=$selected_date;
		$appt_time=$selected_time;
		$appt_status="Requested";
		$payment_status=0;
		$total_cost=$service_list["{$selected_service}"]->getCost();
		
		$stmt = $mysqli->prepare("insert into appointment(CustomerID, PetID, ServiceID, ApptDate, ApptTime, ApptStatus, PaymentStatus, TotalCost)
			values(?,?,?,?,?,?,?,?)");
		$stmt->bind_param("iiisssii", $custID, $petID, $serviceID, $appt_date, $appt_time, $appt_status, $payment_status, $total_cost);
		$stmt->execute();
		$stmt->close();
		}
}

//Check for previous appointments
$has_previous1 = false;
$appt_sql = "Select * from appointment where CustomerID={$_SESSION['custID']} and ApptStatus='Completed' order by ApptDate Desc";
$appt_result = $mysqli-> query($appt_sql);

//Displays only if profile has previous appointments related to it
if($appt_result){
	
	$has_previous1 = true;
	//Create appointment models
	$row1 = $appt_result -> fetch_assoc();
	$appointment1 = new Appointment($row1["AppointmentID"], $row1["CustomerID"], $row1["PetID"], $row1["ServiceID"], $row1["ApptDate"], $row1["ApptTime"],
		$row1["ApptStatus"], $row1["PaymentStatus"], $row1["TotalCost"]);
	
	$has_previous2=false;
	$row2 = mysqli_fetch_assoc($appt_result);
	if($row2){
		$has_previous2=true;
		$appointment2 = new Appointment($row2["AppointmentID"], $row2["CustomerID"], $row2["PetID"], $row2["ServiceID"], $row2["ApptDate"], $row2["ApptTime"],
			$row2["ApptStatus"], $row2["PaymentStatus"], $row2["TotalCost"]);
	}
}
	
function date_available($date, $time){
	include("../database/dbConfig.php");
	$available=false;
	$sql = "Select AppointmentID from appointment where ApptDate='{$selected_date}' and ApptTime='{$selected_time}'";
	$result = $mysqli-> query($sql);
	if(!$result){
		$available = true;
	}
	return $available;
}

function formComplete()
{
	$complete=false;
	if(isset($_POST['pets']) && isset($_POST['date']) && isset($_POST['time']) 
		&& isset($_POST['service']))
		{
			$complete=true;
		}
	return $complete;
	}
	
function getPet($petID)
{
	$pet_list = getPetList();
	foreach($pet_list as $pet){
		if($pet->getID()==$petID){
			$selected_pet = $pet;
			return $selected_pet;
		}
		else{
			echo "error could not find matching pet id";
		}
	}
}

function getPetList(){
	include("../database/dbConfig.php");
	//Query for pets associated with customer profile
	$sql = "Select * from pet where CustomerID = {$_SESSION['custID']}";
	$pet_result = $mysqli-> query($sql);
	$pets = mysqli_fetch_all($pet_result,MYSQLI_ASSOC);
		
	//Create array with pet models for session
	$pet_list=array();
	foreach($pet_list as $pet)
	{
		$current_pet = new Pet($pet["PetID"], $pet["PetName"], $pet["PetType"], $pet["Breed"], $pet["HairType"], $pet["Weight"], $_SESSION['customer']);
		$pet_list["{$current_pet->getName()}"] = $current_pet;
	} 
	return $pet_list;
}

function getService($serviceID)
{
	$service_list = getServiceList();
	foreach($service_list as $service){
		if($service->getID()==$serviceID){
			$selected_service = $service;
			return $selected_service;
		}
		else{
			echo "error could not find matching service id";
		}
	}
}

function getServiceList(){
	include("../database/dbConfig.php");
	//Query for all available services
	$service_sql = "Select * from service";
	$service_result = $mysqli-> query($service_sql);
	$services = mysqli_fetch_all($service_result,MYSQLI_ASSOC);
		
	//Create service model array
	$service_list=array();
	foreach($service_list as $service){
		$current_service = new Service($service["ServiceID"], $service["ServiceName"], $service["ServiceCost"]);
		$service_list["{$current_service->getName()}"] = $current_service;
	}
	return $service_list;
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
                <a href="Home.php">Home</a>
            </div>
            <hr>
        </div>

        <div class="wrapper">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <h3>Book Appointment</h3>
            <h3><label for="Pet">Select Pet: </label>
                <select name="pet_name" id="Pets">
                  <?php 
					foreach($pet_list as $pet): 
					?>
						<option value="<?php $pet->getName(); ?>">
						<?php echo $pet->getName();?>
						</option>
						<?php endforeach;?>
                </select>
            </h3>
            <center>
            <div class="input-field">
                <input type="date" name="date" placeholder="Date" required style="width: 475px; height: 25px;">
                
            </div>
            <br/>

            <div class="input-field">
                <input type="time" name="time" placeholder="Time" required style="width: 475px; height: 25px;">
                
            </div>
            <br/>
            <b><label for="Service">Select Service: </label></b>
                <select name="service" id="Service">
                  <option value="Nail Trim">Nail Trim - $25</option>
                  <option value="Haircut">Haircut - $50</option>
                  <option value="Bath and Brush">Bath & Brush - $75</option>
                  <option value="Full Service Package">Full Service Package - $90</option>
                </select>

            </center>
            <br/>
            <button type="submit" class="btn" style="margin-left:37px; width: 475px; height: 25px;">BOOK!</button>
		</form>
        </div>   
        <hr>
        <div class="wrapper2">
            <center>
			<?php if($has_previous1){
				$pet=getPet($appointment1->getPetID());
				$service=getService($appointment1->getServiceID());
				echo 
                '<h3>Past Appointments</h3>
                <table>
                <tr>
                  <th>Appointment ID</th>
                  <td>'.$appointment1->getID().'</td>
                </tr>
                <tr>
                  <th>Pet Name</th>
                  <td>'.$pet->getName().'
					</td>
                </tr>
                <tr>
                  <th>Date</th>
                  <td>'.$appointment1->getApptDate().'</td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td>'.$appointment1->getApptTime().'</td>
                </tr>
                <tr>
                    <th>Service</th>
                    <td>'.$service->getName().'</td>
                </tr>
                <tr>
                    <th>Cost</th>
                    <td>'.$appointment1->getTotalCost().'</td>
                </tr>
                <tr>
                    <th>Payment Status</th>
                    <td>'.$appointment1->getPaymentStatus().'
					</td>
                </tr>
			</table>'; }?>
			  <?php if($has_previous2){
				$pet=getPet($appointment2->getPetID());
				$service=getService($appointment2->getServiceID());
				echo 
                '<h3>Past Appointments</h3>
                <table>
                <tr>
                  <th>Appointment ID</th>
                  <td>'.$appointment2->getID().'</td>
                </tr>
                <tr>
                  <th>Pet Name</th>
                  <td>'.$pet->getName().'
					</td>
                </tr>
                <tr>
                  <th>Date</th>
                  <td>'.$appointment2->getApptDate().'</td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td>'.$appointment2->getApptTime().'</td>
                </tr>
                <tr>
                    <th>Service</th>
                    <td>'.$service->getName().'</td>
                </tr>
                <tr>
                    <th>Cost</th>
                    <td>'.$appointment2->getTotalCost().'</td>
                </tr>
                <tr>
                    <th>Payment Status</th>
                    <td>'.$appointment2->getPaymentStatus().'
					</td>
                </tr>
              </table>'; }?>
              <br/>
              <hr>
              <br/>
            </center>
        </div>
    </div>
</body>
</html>
