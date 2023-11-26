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
        <form name = "Login">

            <div class="image">
                <img src="PawSalon.png" alt="Icon" class="Icon">
            </div>    

            <h1>Login</h1>
            
            <div class="input-box">
                <div class="input-field">
                        <i class='bx bx-user'></i>
                        <input type="text" placeholder="Email" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                        <i class='bx bx-user'></i>
                        <input type="text" placeholder="Password" required style="width: 475px; height: 25px;">
                        
                </div>
            </div>

            <br/>

            <button type="submit" class="btn" style="margin-left:0px; width: 475px; height: 25px;">Login</button>
            <h2>Don't have an account?</h2>
            <h2> Click below to register.</h2>
            <button onclick="location.href='Registration.php'" type="submit" class="btn" style="margin-left:90px; width: 300px; height: 25px;">Register</button>

            
        </form>
    </div>
</body>
</html>