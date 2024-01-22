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

        <div class="container-list-favorites">
            <div class="header-favorite">
                <h3>Favoritos</h3>
                <i class="fa-solid fa-xmark" id="btn-close"></i>
            </div>
            
            <div class="list-favorites">
                <div class="card-favorite">
                </div>
            </div>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cart = document.getElementById("cart");
        const toggleCartBtn = document.getElementById("toggle-cart");
        const cartItems = document.getElementById("cart-items");
        const cartTotal = document.getElementById("cart-total");
        const checkoutBtn = document.getElementById("checkout-btn");

        let total = 0;

        toggleCartBtn.addEventListener("click", function () {
            cart.style.display = cart.style.display === "none" ? "block" : "none";
        });

        cartItems.addEventListener("click", function (event) {
            if (event.target.tagName === "LI") {
                const product = event.target.textContent.split(" - ");
                const productId = event.target.dataset.product;

                const removeButton = document.createElement("button");
                removeButton.textContent = "Eliminar";
                removeButton.addEventListener("click", function () {
                    total -= parseInt(product[1]);
                    cartTotal.textContent = total;
                    cartItems.removeChild(event.target);
                });

                event.target.appendChild(removeButton);
            }
        });

        checkoutBtn.addEventListener("click", function () {
            alert("Compra realizada por $" + total);
            total = 0;
            cartTotal.textContent = total;
            cartItems.innerHTML = "";
            cart.style.display = "none";
        });

        document.addEventListener("click", function (event) {
            if (!cart.contains(event.target) && event.target !== toggleCartBtn) {
                cart.style.display = "none";
            }
        });
    });
</script>

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

    <script src="main.js"></script>

</body>

</html>
