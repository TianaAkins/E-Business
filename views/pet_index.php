<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pet Profile</title>
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body class="bg-light">

<div class="container">
<div class="py-5 text-center">
        <h2>Pet Profile</h2>
        <p class="lead">Please Enter Pet Information</p>
      </div>
<fieldset>
  
  <form name="frmPetProfile" method="post" action="Pet.php">
    <p>
      <label for="Name">CustomerID </label>
      <input type="text" class="form-control" name="CustomerID" id="CustomerID" placeholder="CustomerID" value="" required>
    </p>
	    <p>
      <label for="email">Pet Number</label>
      <input type="text"  class="form-control"  name="PetNum" id="PetNum" placeholder="Pet Number" value="" required>
    </p>
	    <p>
      <label for="email">Pet Name</label>
      <input type="text"  class="form-control"  name="PetName" id="PetName" placeholder="Pet Name" value="" required>
    </p>
    <p>
      <label for="email">Pet Type</label>
      <input type="text"  class="form-control"  name="PetType" id="PetType" placeholder="Pet Type" value="" required>
    </p>
    <p>
      <label for="phone">Breed</label>
      <input type="text"  class="form-control" name="Breed" id="Breed" placeholder="Breed" value="" required>
    </p>
	<p>
      <label for="phone">Hair Type</label>
      <input type="text"  class="form-control" name="HairType" id="HairType" placeholder="Hair Type" value="" required>
    </p>
	<p>
      <label for="phone">Weight</label>
      <input type="text"  class="form-control" name="Weight" id="Weight" placeholder="Weight" value="" required>
    </p>
    
    <p>&nbsp;</p>
    <p>
      <input type="submit" name="Submit" id="Submit" value="Submit Profile"  class="btn btn-primary btn-lg btn-block">
    </p>
  </form>
</fieldset>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>