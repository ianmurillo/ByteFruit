

function addToFavorites(productName) {
  const favoritesList = document.getElementById('favorites');
  const product = document.createElement('li');
  product.className = 'favorite-item';
  product.innerHTML = `
      <img src='../../../public/imagen_producto.jpg' alt='${productName}'>
      <span>${productName}</span>
      <button class='remove-from-favorites' onclick="removeFromFavorites(this)">Eliminar</button>
  `;
  favoritesList.appendChild(product);

  // Mostrar la lista de favoritos si no está visible
  document.getElementById('favorites-list').style.display = 'block';
}

function removeFromFavorites(button) {
  const productItem = button.parentNode;
  const favoritesList = productItem.parentNode;
  favoritesList.removeChild(productItem);

  // Ocultar la lista de favoritos si está vacía
  if (favoritesList.children.length === 0) {
      document.getElementById('favorites-list').style.display = 'none';
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
            updateCartUI();
        }
    
        function removeProductFromCart(target) {
            const indexToRemove = parseInt(target.dataset.index);
            cart.items.splice(indexToRemove, 1);
            updateCartUI();
        }
    
        function updateQuantity(target) {
            const indexToUpdate = parseInt(target.dataset.index);
            const delta = target.classList.contains('increase') ? 1 : -1;
            cart.items[indexToUpdate].quantity += delta;
            if (cart.items[indexToUpdate].quantity < 1) cart.items[indexToUpdate].quantity = 1;
            updateCartUI();
        }
    
        function clearCart() {
            cart.items.length = 0;
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
    });
    
    
    /*TRADUCTOR*/
