<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteFruit</title>
    <link rel="icon" href="../../../public/logo.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <!-- CSS de Bootstrap -->
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
            <h2>Favorites</h2>
            <ul id="favorites">
            </ul>
        </div>

        <label id="cart-sidebar-btn">🛒</label>

        <div id="cart-sidebar" class="offcanvas offcanvas-end">
            <label type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas">✖️</label>
            <h2 id="carrito">Shopping cart</h2>
            <ul id="cart-items-sidebar" class="list-group"></ul>
            <p id="cart-total-sidebar">Total: 0.00€</p>
            <button id="clear-cart-btn-sidebar" class="btn btn-danger mt-3">Empty cart</button>
            <button id="checkout-btn-sidebar" >Make a purchase</button>
        </div>

    </header>

    <input type="checkbox" id="btn-menu">
    <div class="container-menu">
        <div class="cont-menu">
            <nav>
            <a href="../Hasiera/index.php">Start</a>
            <a href="../GureInformazia/gureinformazioa.php">Our information</a>
            <a href="../Katalogo/katalogoa.php">Catalog</a>
            <a href="../Notiziak/notiziak.php">News</a>
            <a href="../Hornitzaileak/hornitzaileak.php">Suppliers</a>
            </nav>
            <label for="btn-menu">✖️</label>
        </div>
    </div>

    <script src="../../js/main.js"></script>

</body>

</html>
