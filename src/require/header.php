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
        

        <div id="favorites-list">
            <h2>Gustokoenak</h2>
            <ul id="favorites">
            </ul>
        </div>

        <label id="cart-sidebar-btn">🛒</label>

        <div id="cart-sidebar" class="offcanvas offcanvas-end">
            <label type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas">✖️</label>
            <h2 id="carrito">Erosketa saskia</h2>
            <ul id="cart-items-sidebar" class="list-group"></ul>
            <p id="cart-total-sidebar">Totala: 0.00€</p>
            <button id="clear-cart-btn-sidebar" class="btn btn-danger mt-3">Hustu saskia</button>
            <button id="checkout-btn-sidebar"><a href="../Ordainketa/ordainketa.php">Erosketa egin</a></button>
        </div>

    </header>

    <input type="checkbox" id="btn-menu">
    <div class="container-menu">
        <div class="cont-menu">
            <nav>
            <a href="../Hasiera/index.php">Hasiera</a>
            <a href="../GureInformazia/gureinformazioa.php">Gure informazioa</a>
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
