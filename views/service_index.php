<?php 

    require_once('config/db_connection.php');
    $query = " SELECT * FROM `service` ";
    $result = mysqli_query($mysqli,$query);

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

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $ServiceID = $row['ServiceID'];
                                        $ServiceName = $row['ServiceName'];
                                        $ServiceCost = $row['ServiceCost'];
                            ?>
                                    <tr>
                                        <td><?php echo $ServiceID ?></td>
                                        <td><?php echo $ServiceName ?></td>
                                        <td><?php echo $ServiceCost ?></td>
                                        <td><a href="#" class="btn btn-pencil">Edit</a></td>
                                        <td><a href="#" class="btn btn-danger">Delete</a></td>
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