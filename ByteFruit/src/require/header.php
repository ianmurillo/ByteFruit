<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteFruit</title>
    <link rel="icon" href="../../../public/logo.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>

<body>

    <header class="navbar">
        <div class="container">
            <div class="btn-menu">
                <label for="btn-menu">☰</label>
            </div>
        </div>
        <div class="logo">
            <img src="../../../public/logo.png" class="logo">
        </div>

        <div id="favorites-list">
            <h2>Lista de Favoritos</h2>
            <ul id="favorites">
            <!-- La lista de favoritos se mostrará aquí -->
            </ul>
        </div>

        <div id="cart-container">
            <button id="toggle-cart">🛒</button>
            <div id="cart">
                <h2>Cesta</h2>
                <ul id="cart-items"></ul>
                <p>Total: $<span id="cart-total">0</span></p>
                <button id="checkout-btn">Realizar Compra</button>
            </div>
        </div>


    </header>


    <input type="checkbox" id="btn-menu">
    <div class="container-menu">
        <div class="cont-menu">
            <nav>
            <a href="../Hasiera/index.php">Hasiera</a>
            <a href="../GureInformazia/OurInfo.php">Gure Informazioa</a>
            <a href="../Katalogo/katalogoa.php">Katalogoa</a>
            <a href="../Notiziak/notiziak.php">Notiziak</a>
            <a href="../Hornitzaileak/hornitzaileak.php">Hornitzaileak</a>
            </nav>
            <label for="btn-menu">✖️</label>
        </div>
    </div>

    <script src="../../js/main.js"></script>

</body>

</html>
