<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw Salon - Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form action="signup.php" method="post">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>    
        </div>

        <div>
            <label for="email">E-mail</label>
            <input type="emai" id="email" name="email" required>    
        </div>

        <div>
            <label for="address">Address</label>
            <input type="text" id="address" name="address">    
        </div>

        <div>
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-345-6789" required>
        </div>
        
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>    
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <button type="submit" name="submit">Submit</button>
                
    </form>
    
</body>
</html>