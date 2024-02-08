// Objeto para almacenar los productos agregados
let productosAgregados = {};

// Función para obtener los productos de favoritos desde el almacenamiento local
function getFavoritesFromLocalStorage() {
    const favorites = localStorage.getItem('productosAgregados');
    if (favorites) {
        // Si hay productos de favoritos en el almacenamiento local, los fusionamos con los productos existentes
        productosAgregados = { ...productosAgregados, ...JSON.parse(favorites) };
    }
}

// Función para guardar los productos de favoritos en el almacenamiento local
function saveFavoritesToLocalStorage() {
    localStorage.setItem('productosAgregados', JSON.stringify(productosAgregados));
}

// Función para alternar la visibilidad de la lista de favoritos
function toggleFavorites() {
    const favoritesList = document.getElementById('favorites-list');
    favoritesList.style.display = favoritesList.style.display === 'none' ? 'block' : 'none';
}

// Agregar evento para cargar los productos de favoritos desde el almacenamiento local cuando se carga la página
document.addEventListener('DOMContentLoaded', function () {
    getFavoritesFromLocalStorage();
    updateFavoritesUI();

    // Obtener referencias a la lista de favoritos y al botón de abrir favoritos
    const openFavoritesButton = document.getElementById('open-favorites');

    // Agregar evento de clic al botón de abrir favoritos
    openFavoritesButton.addEventListener('click', function () {
        // Alternar la visibilidad de la lista de favoritos
        toggleFavorites();
    });
});

function addToFavorites(productName, productModel, productImage, productNameDisplay) {
    // Generar una clave única para el producto basada en el nombre y el modelo
    const productKey = productName + '-' + productModel;

    // Agregar el producto a la lista de favoritos
    const favoritesList = document.getElementById('favorites');
    const product = document.createElement('li');
    product.className = 'favorite-item';
    product.innerHTML = `
        <img src='${productImage}' alt='${productName}'>
        <span>${productNameDisplay}</span>
        <button class='remove-from-favorites' onclick="removeFromFavorites(this)">✖️</button>
    `;
    favoritesList.appendChild(product);

    // Agregar el producto al objeto de productos agregados
    productosAgregados[productKey] = true;

    // Guardar los productos de favoritos en el almacenamiento local
    saveFavoritesToLocalStorage();

    // Mostrar la lista de favoritos si no está visible
    document.getElementById('favorites-list').style.display = 'block';
}

function removeFromFavorites(button) {
    const productItem = button.parentNode;
    const favoritesList = productItem.parentNode;
    favoritesList.removeChild(productItem);

    // Obtener el nombre y el modelo del producto para eliminarlo del objeto de productos agregados
    const productName = productItem.querySelector('span').textContent;
    const productModel = productItem.querySelector('img').alt;
    const productKey = productName + '-' + productModel;

    // Eliminar el producto del objeto de productos agregados
    delete productosAgregados[productKey];

    // Guardar los productos de favoritos actualizados en el almacenamiento local
    saveFavoritesToLocalStorage();

    // Ocultar la lista de favoritos si está vacía
    if (favoritesList.children.length === 0) {
        document.getElementById('favorites-list').style.display = 'none';
    }
}

// Función para actualizar la interfaz de usuario de la lista de favoritos
function updateFavoritesUI() {
    const favoritesList = document.getElementById('favorites');
    favoritesList.innerHTML = '';
    for (const productKey in productosAgregados) {
        const [productName, productModel] = productKey.split('-');
        const productImage = ''; // Aquí deberías obtener la URL de la imagen según el nombre y el modelo del producto
        const productNameDisplay = productName; // Nombre del producto para mostrar
        const product = document.createElement('li');
        product.className = 'favorite-item';
        product.innerHTML = `
            <img src='${productImage}' alt='${productName}'>
            <span>${productNameDisplay}</span>
            <button class='remove-from-favorites' onclick="removeFromFavorites(this)">✖️</button>
        `;
        favoritesList.appendChild(product);
    }
}



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
    
