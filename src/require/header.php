<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteFruit</title>
    <link rel="icon" href="../../../public/logo.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 </head>

<body>

    <header class="navbar">
        <div class="container">
            <div class="btn-menu">
                <label for="btn-menu">☰</label>
            </div>
            <div class="logo">
                <img src="../../../public/logo.png" class="logo">
            </div> 
        </div>
        
        <div id="trans">
            <?php 
            $APP_DIR;
            require_once("../Hizkuntzak/itzuli.php"); 
            require_once("../Hizkuntzak/hizkuntza.php");
            ?>
        </div>

        <div>
            <label id="open-favorites" onclick="toggleFavorites()">♡</label>
        </div>


        <div id="favorites-list">
            <h2><?= itzuli("fav") ?></h2>
            <ul id="favorites">
            </ul>
        </div>

        <label id="cart-sidebar-btn">🛒</label>

        <div id="cart-sidebar" class="offcanvas offcanvas-end">
            <label type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas">✖️</label>
            <h2 id="carrito"><?= itzuli("saskia") ?></h2>
            <ul id="cart-items-sidebar" class="list-group"></ul>
            <p id="cart-total-sidebar"><?= itzuli("total") ?></p>
            <button id="clear-cart-btn-sidebar" class="btn btn-danger mt-3"><?= itzuli("hustu") ?></button>
            <button id="checkout-btn-sidebar"><?= itzuli("erosi") ?></button>
        </div>


    </header>

    <input type="checkbox" id="btn-menu">
    <div class="container-menu">
        <div class="cont-menu">
            <nav>
            <a href="../Hasiera/index.php"><?= itzuli("hasiera") ?></a>
            <a href="../GureInformazia/gureinformazioa.php"><?= itzuli("gureInfo") ?></a>
            <a href="../Katalogo/katalogoa.php"><?= itzuli("katalogoa") ?></a>
            <a href="../Notiziak/notiziak.php"><?= itzuli("notiziak") ?></a>
            <a href="../Hornitzaileak/hornitzaileak.php"><?= itzuli("hornitzaileak") ?></a>
            </nav>
            <label for="btn-menu">✖️</label>
        </div>
    </div>

    <script src="../../js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>
