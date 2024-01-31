<!DOCTYPE html>
<html>
    
    <?php
    require_once("../../require/header.php");
    ?>

    <div class="filter-section">
        <form method="GET">
            <label for="dateFilterFrom">Hasierako data:</label>
            <input type="date" id="dateFilterFrom" name="dateFrom" value="<?php echo isset($_GET['dateFrom']) ? $_GET['dateFrom'] : ''; ?>">
            <label for="dateFilterTo">Amaierako data:</label>
            <input type="date" id="dateFilterTo" name="dateTo" value="<?php echo isset($_GET['dateTo']) ? $_GET['dateTo'] : ''; ?>">
            <button aria-label="Filtratu" type="submit" class="filter-button" id="filter-button">Filtratu</button>
        </form>
    </div>        
    <div class="filter-section">
        <form method="GET">
            <label for="fecha">Data:</label><br>
            <input type="date" id="fecha" name="fecha" value="<?php echo isset($_GET['fecha']) ? $_GET['fecha'] : ''; ?>" ><br>
            <select name="seleccion1" id="seleccion1">
                <option value="all" <?php if (isset($_GET['seleccion1']) && $_GET['seleccion1'] === 'all') echo 'selected="selected"'; ?>></option>
                <option value="aurreragokoak" <?php if (isset($_GET['seleccion1']) && $_GET['seleccion1'] === 'aurreragokoak') echo 'selected="selected"'; ?>>aurreragokoak</option>
                <option value="lehenagokoak" <?php if (isset($_GET['seleccion1']) && $_GET['seleccion1'] === 'lehenagokoak') echo 'selected="selected"'; ?>>lehenagokoak</option>
            </select>
            <button aria-label="Filtratu" type="submit" class="filter-button" id="filter-button">Filtratu</button>
        </form>
    </div>
    <center><h2>Berri informatikoak</h2></center>
    <center>
    <?php     
    require_once("../../require/functions.php");
                
    $conn = null;
    $conn = connect($conn);    
    
    $dateFilterFrom = isset($_GET['dateFrom']) ? $_GET['dateFrom'] : '';
    $dateFilterTo = isset($_GET['dateTo']) ? $_GET['dateTo'] : '';
    $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';
    $seleccion1 = isset($_GET['seleccion1']) ? $_GET['seleccion1'] : '';

    $sql = "SELECT * FROM berriak WHERE 1=1";

    if ($dateFilterFrom !== '') {
        $sql .= " AND ArgitaratzeData >= '$dateFilterFrom'";
    }
    if ($dateFilterTo !== '') {
        $sql .= " AND ArgitaratzeData <= '$dateFilterTo'";
    }
    if ($fecha !== '' && $seleccion1 === 'aurreragokoak') {
        $sql .= " AND ArgitaratzeData >= '$fecha'";
    }
    if ($fecha !== '' && $seleccion1 === 'lehenagokoak') {
        $sql .= " AND ArgitaratzeData <= '$fecha'";
    }

    $result = $conn->query($sql);    
    if ($result->num_rows > 0) {         
        while ($row = $result->fetch_assoc()) {             
            echo "<div class='notiziak'>                     
            <h3>" . $row["Izenburua"] . "</h3>                    
            <p>" . $row["Notizia"] . "</p>    
            <p>" . $row["ArgitaratzeData"] . "</p> 
            <img src='../../../public/" . $row["Argazkiak"] . "'>                  
            </div>";         
        }    
    } else {         
        echo "Ez dago datuak taulan.";     
    }     
    $conn->close();     
    ?>
    </center>
    
    <?php
    require_once("../../require/footer.php");
    ?>

</html>