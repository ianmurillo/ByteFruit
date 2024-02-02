<!DOCTYPE html>
<html>
    
    <?php
    require_once("../../require/header.php");
    ?>
 
<div class="container">
    
    <center><h2><?= itzuli("hornitzaileak") ?></h2></center>

    <form action="hornitzaileak.php" method="post">
            <label for="telefonoa"><?= itzuli("telZen") ?></label>
            <input type="text" name="TelZenbakia" required><br><br>

            <label for="izena"><?= itzuli("saskia") ?></label>
            <input type="text" name="Izena" required><br><br>

            <label for="NAN"><?= itzuli("nan") ?></label>
            <input type="text" name="NAN" required><br><br>

            <label><?= itzuli("mota") ?></label>
            <input type="radio" name="HornitzaileMota" value="empresa" required> <?= itzuli("op1") ?>
            <input type="radio" name="HornitzaileMota" value="pertsona" required> <?= itzuli("op2") ?><br><br>

            <label for="helbidea"><?= itzuli("helb") ?></label>
            <input type="text" name="Helbidea" required><br><br>

            <label for="eskaintza"><?= itzuli("zerbiztua") ?></label>
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