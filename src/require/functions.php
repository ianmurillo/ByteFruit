<?php
    function connect(&$conn){    
        /** DB-ra konektatu */
        $dbName = "newlife";
        $conn = null;
        $servername = "localhost";
        $username = "root";
        $password = "abc123ABC";
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbName);
    
        // Check connection
        if ($conn->connect_error) {
            die("Errorea: " . $conn->connect_error);
        }

        return $conn;
    }
    ?>

