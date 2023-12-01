<?php
        $host = "localhost";
        $dbname = "PawSalon";
        $username = "root";
        $pw = "root";

        $mysqli = new mysqli($host, $username, $pw, $dbname);

        if ($mysqli->connect_error) 
		{
            die("Connection Error: " . $mysqli->connect_error);
        }
?>