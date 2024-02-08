<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Pago - Tienda Online</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
    <!-- Agregar estilos personalizados aquí -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007bff;
        }
        label {
            font-weight: bold;
        }
        .payment-method-section {
            display: none;
        }

        #caja{
            padding: 10px;
        }
    </style>

    <?php
    require_once("../../require/header.php");
    ?>
    
</head>
<body>

    <div class="container mt-5">
    
    <center><h2><?= itzuli("hornitzaileak") ?></h2></center>

    <form action="datuak.php" method="post">
            <label for="NAN"><?= itzuli("NAN") ?></label>
            <input type="text" name="NAN" required><br><br>

            <label for="izena"><?= itzuli("izena") ?></label>
            <input type="text" name="izena" required><br><br>

            <label for="korreo"><?= itzuli("korreo") ?></label>
            <input type="text" name="korreo" required><br><br>

            <label for="kontukorronte"><?= itzuli("kontukorronte") ?></label>
            <input type="text" name="kontukorronte" required><br><br>

            <button type="submit" class="btn btn-primary" id="miBoton">Erosketa egin</button>
    </form>
    </div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("../../require/functions.php");
            
    $conn = null;
    $conn = connect($conn);

    $NAN = $_POST["NAN"];
    $izena = $_POST["izena"];
    $korreo = $_POST["korreo"];

    $sql = "INSERT INTO eroslea (NAN, izena, korreo) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $NAN, $izena, $korreo);

    $stmt->execute();
    
    $stmt->close();
    $conn->close();

    header("Location: ordainketa.php");
    exit(); 
}
?>

<?php
require_once("../../require/footer.php");
?>

    <script src="../../js/main.js"></script>

</body>
</html>
