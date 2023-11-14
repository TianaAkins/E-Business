<?php

require_once 'config/db_connection.php';
require_once 'controllers/servicecontroller.php';

$result = display_data();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services</title>
</head>
<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr class="bg-dark text-white">
                                <td> Service ID</td>
                                <td> Service Name </td>
                                <td> Service Cost </td>
                            </tr>
                            <tr>
                            <?php   

                                while($row=mysqli_fetch_assoc($result))
                                {
                            ?>                                    
                                    <td><?php echo $row['ServiceId']; ?></td>
                                    <td><?php echo $row['ServiceName']; ?></td>
                                    <td><?php echo $row['ServiceCost']; ?></td>
                            </tr>        
                            <?php 
                              } 

                            ?>                                                                                               
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>