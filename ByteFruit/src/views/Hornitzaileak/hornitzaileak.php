<!DOCTYPE html>
<html>
    
    <?php
    require_once("../../require/header.php");
    ?>
 
<div class="container">
    
    <center><h2>Hornitzaile formularioa</h2></center>

    <form action="hornitzaileak.php" method="post">
            <label for="telefonoa">Telefono zenbakia:</label>
            <input type="text" name="TelZenbakia" required><br><br>

            <label for="izena">Izena:</label>
            <input type="text" name="Izena" required><br><br>

            <label for="NAN">NAN:</label>
            <input type="text" name="NAN" required><br><br>

            <label>Hornitzaile mota:</label>
            <input type="radio" name="HornitzaileMota" value="empresa" required> Enpresa
            <input type="radio" name="HornitzaileMota" value="pertsona" required> Pertsona<br><br>

            <label for="helbidea">Helbidea:</label>
            <input type="text" name="Helbidea" required><br><br>

            <label for="eskaintza">Eskaintzen den zerbitzua edo produktua:</label>
            <input type="text" name="Zerbitzua" required><br><br>

            <input type="submit" value="Gorde hornitzailea">
        </form>
</div>
 
</body>
</html>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once("../../require/functions.php");
                
        $conn = null;
        $conn = connect($conn);

        $telefonoa = $_POST["TelZenbakia"];
        $izena = $_POST["Izena"];
        $NAN = $_POST["NAN"];
        $mota = $_POST["HornitzaileMota"];
        $helbidea = $_POST["Helbidea"];
        $eskaintza = $_POST["Zerbitzua"];

        $sql = "INSERT INTO hornitzaileFormulario (TelZenbakia, Izena, NAN, HornitzaileMota, Helbidea, Zerbitzua) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $telefonoa, $izena, $NAN, $mota, $helbidea, $eskaintza);

        if ($stmt->execute()) {
            echo "Datuak datu-basean gorde dira.";
        } else {
            echo "Errorea datuak datu-basean sartzerakoan: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
?>

    <?php
    require_once("../../require/footer.php");
    ?>
</html>