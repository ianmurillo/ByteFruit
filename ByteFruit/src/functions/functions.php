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

        echo '<div class="navbar">
        
        <a href="../Hasiera/index.html">Hasiera</a>
        <a href="../GureInformazia/OurInfo.html">Gure Informazioa</a>
        <a href="katalogoa.php">Katalogoa</a>
        <a href="../Notiziak/notiziak.php">Notiziak</a>
        <a href="../Hornitzaileak/hornitzaileak.php">Hornitzaileak</a>
        
        <div class="navbar-right">
        <a href="../Login/login.php">Saioa hasi</a>
            <a href="../Erregistratu/registratu.html">Erregistratu</a>
        </div>
            
        </div>';
?>