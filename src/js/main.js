$(document).ready(function () {
    let productosAgregados = {};

    function getFavoritesFromLocalStorage() {
        const favorites = localStorage.getItem('productosAgregados');
        if (favorites) {
            productosAgregados = { ...productosAgregados, ...JSON.parse(favorites) };
        }
    }

    function saveFavoritesToLocalStorage() {
        localStorage.setItem('productosAgregados', JSON.stringify(productosAgregados));
    }

    function toggleFavorites() {
        $('#favorites-list').toggle();
    }

    $(document).on('click', '#open-favorites', function () {
        toggleFavorites();
    });

    getFavoritesFromLocalStorage();
    updateFavoritesUI();

    function addToFavorites(productName, productModel, productImage, productNameDisplay) {
        const productKey = productName + '-' + productModel;
        const favoritesList = $('#favorites');
        const product = $('<li>').addClass('favorite-item').html(`
            <img src='${productImage}' alt='${productName}'>
            <span>${productNameDisplay}</span>
            <button class='remove-from-favorites'>✖️</button>
        `);
        favoritesList.append(product);
        productosAgregados[productKey] = true;
        saveFavoritesToLocalStorage();
        $('#favorites-list').show();
    }

    $(document).on('click', '.remove-from-favorites', function () {
        const productItem = $(this).parent();
        const productName = productItem.find('span').text();
        const productModel = productItem.find('img').attr('alt');
        const productKey = productName + '-' + productModel;
        delete productosAgregados[productKey];
        productItem.remove();
        saveFavoritesToLocalStorage();
        if ($('#favorites-list').children().length === 0) {
            $('#favorites-list').hide();
        }
    });

    function updateFavoritesUI() {
        const favoritesList = $('#favorites');
        favoritesList.empty();
        for (const productKey in productosAgregados) {
            const [productName, productModel] = productKey.split('-');
            const productImage = ''; // Aquí deberías obtener la URL de la imagen según el nombre y el modelo del producto
            const productNameDisplay = productName; // Nombre del producto para mostrar
            const product = $('<li>').addClass('favorite-item').html(`
                <img src='${productImage}' alt='${productName}'>
                <span>${productNameDisplay}</span>
                <button class='remove-from-favorites'>✖️</button>
            `);
            favoritesList.append(product);
        }
    }
});




    /* CARRITO*/
 
    document.addEventListener('DOMContentLoaded', function () {
        const cart = { 
            items: [],
            sidebar: document.getElementById('cart-sidebar'),
            itemsElement: document.getElementById('cart-items-sidebar'),
            totalElement: document.getElementById('cart-total-sidebar'),
            btn: document.getElementById('cart-sidebar-btn'),
            closeBtn: document.querySelector('.btn-close'),
            checkoutBtn: document.getElementById('checkout-btn-sidebar'),
            clearCartBtn: document.getElementById('clear-cart-btn-sidebar'),
        };
    
        // Recuperar datos del carrito desde el almacenamiento local al cargar la página
        if (localStorage.getItem('cart')) {
            cart.items = JSON.parse(localStorage.getItem('cart'));
            updateCartUI();
        }
    
        cart.btn.addEventListener('click', toggleCartSidebar);
        cart.closeBtn.addEventListener('click', toggleCartSidebar);
        document.addEventListener('click', handleClickEvents);
    
        function toggleCartSidebar() {
            cart.sidebar.style.right = cart.sidebar.style.right === '0px' ? '-300px' : '0';
            cart.btn.classList.toggle('hidden');
        }
    
        function handleClickEvents(event) {
            const target = event.target;
    
            if (target.classList.contains('add-to-cart')) {
                addProductToCart(target);
            } else if (target.classList.contains('remove-from-cart-sidebar')) {
                removeProductFromCart(target);
            } else if (target.classList.contains('quantity-btn')) {
                updateQuantity(target);
            } else if (target.id === 'checkout-btn-sidebar') {
                checkout();
            } else if (target.id === 'clear-cart-btn-sidebar') {
                clearCart();
            }
        }
    
        function addProductToCart(target) {
            const { name, marka, modeloa, price } = target.dataset;
            const existingItem = cart.items.find(item => item.name === name && item.marka === marka && item.modeloa === modeloa);
            existingItem ? existingItem.quantity++ : cart.items.push({ name, marka, modeloa, price: parseFloat(price), quantity: 1 });
    
            // Actualizar el almacenamiento local con los nuevos datos del carrito
            localStorage.setItem('cart', JSON.stringify(cart.items));
    
            updateCartUI();
        }
    
        function removeProductFromCart(target) {
            const indexToRemove = parseInt(target.dataset.index);
            cart.items.splice(indexToRemove, 1);
    
            // Actualizar el almacenamiento local con los nuevos datos del carrito
            localStorage.setItem('cart', JSON.stringify(cart.items));
    
            updateCartUI();
        }
    
        function updateQuantity(target) {
            const indexToUpdate = parseInt(target.dataset.index);
            const delta = target.classList.contains('increase') ? 1 : -1;
            cart.items[indexToUpdate].quantity += delta;
            if (cart.items[indexToUpdate].quantity < 1) cart.items[indexToUpdate].quantity = 1;
    
            // Actualizar el almacenamiento local con los nuevos datos del carrito
            localStorage.setItem('cart', JSON.stringify(cart.items));
    
            updateCartUI();
        }
    
        function clearCart() {
            cart.items.length = 0;
    
            // Borrar los datos del carrito del almacenamiento local al limpiar el carrito
            localStorage.removeItem('cart');
    
            updateCartUI();
        }
    
        function updateCartUI() {
            cart.itemsElement.innerHTML = cart.items.map((item, index) => `
                <div>
                    <span id="produktua">${item.name} - ${item.marka} - ${item.modeloa} - €${item.price.toFixed(2)} x ${item.quantity}</span>
                    <label class='quantity-btn increase' data-index='${index}'>➕</label>
                    <label class='quantity-btn decrease' data-index='${index}'>➖</label>
                    <label class='remove-from-cart-sidebar' data-index='${index}'>✖️</label>
                </div>
            `).join('');
            cart.totalElement.textContent = `Total: ${calculateTotal().toFixed(2)}`;
        }
    
        function calculateTotal() {
            return cart.items.reduce((total, item) => total + item.price * item.quantity, 0);
        }

        // Selecciona el botón "Erosketa Egin" por su id
        const erosketaEginBtn = document.getElementById('checkout-btn-sidebar');

        // Agrega un event listener al botón
        erosketaEginBtn.addEventListener('click', function() {
        // Redirige a la página deseada
        window.location.href = '../../views/Ordainketa/datuak.php';
    });

    });

    
    
    
    //ORDAINKETA
    
    document.addEventListener('DOMContentLoaded', function () {
        // Selecciona el botón "Erosketa Egin" por su id
        const boton = document.getElementById('miBoton');
    
        // Agrega un event listener al botón
        boton.addEventListener('click', function() {
            // Redirige a la página deseada
            window.location.href = 'ordainketa.php';
        });
    });
    
