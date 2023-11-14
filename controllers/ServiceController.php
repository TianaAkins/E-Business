<?php
    require_once 'config/db_connection.php';

    function display_data(){

        global $mysqli;
        $query = "select * from service";
        $result = mysqli_query($mysqli, $query);
        return $result;
    }

?>