document.addEventListener("DOMContentLoaded", function () {
  const cart = document.getElementById("cart");
  const toggleCartBtn = document.getElementById("toggle-cart");
  const cartItems = document.getElementById("cart-items");
  const cartTotal = document.getElementById("cart-total");
  const checkoutBtn = document.getElementById("checkout-btn");
  const favoritesList = document.getElementById('favorites');
  const searchButton = document.getElementById('search-button');
  const filterButton = document.getElementById('filter-button');

  let cartItemsArray = [];
  let total = 0;

  if (toggleCartBtn && cart && cartItems && cartTotal && checkoutBtn && favoritesList && searchButton && filterButton) {
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
                  cartItemsArray = cartItemsArray.filter(item => item.name !== product[0]);
                  updateCartUI();
              });

              event.target.appendChild(removeButton);
          }
      });

      checkoutBtn.addEventListener("click", function () {
          alert("Compra realizada por $" + total);
          total = 0;
          cartTotal.textContent = total;
          cartItemsArray = [];
          updateCartUI();
          cart.style.display = "none";
      });

      document.addEventListener("click", function (event) {
          if (!cart.contains(event.target) && event.target !== toggleCartBtn) {
              cart.style.display = "none";
          }
      });

      searchButton.addEventListener('click', function () {
          const searchTerm = document.getElementById('search-input').value;
          searchProducts(searchTerm);
      });

      filterButton.addEventListener('click', function () {
          // Lógica para aplicar filtros (puedes implementar según tus necesidades)
          applyFilters();
      });

      function searchProducts(term) {
          // Lógica para buscar productos (puedes implementar según tus necesidades)
          // ...
      }

      function applyFilters() {
          // Lógica para aplicar filtros (puedes implementar según tus necesidades)
          // ...
      }
  }

  function addToCart(productName, price) {
      // Añadir el producto al carrito
      cartItemsArray.push({ name: productName, price: price });

      // Actualizar el total del carrito
      total += price;

      // Actualizar la interfaz de usuario
      updateCartUI();
  }

  function updateCartUI() {
      // Obtener elementos de la interfaz de usuario
      const cartItemsElement = document.getElementById("cart-items");
      const cartTotalElement = document.getElementById("cart-total");

      if (cartItemsElement && cartTotalElement) {
          // Limpiar la lista de elementos del carrito
          cartItemsElement.innerHTML = "";

          // Iterar sobre los elementos del carrito y agregarlos a la lista
          cartItemsArray.forEach(item => {
              const listItem = document.createElement("li");
              listItem.textContent = `${item.name} - $${item.price}`;
              cartItemsElement.appendChild(listItem);
          });

          // Actualizar el total del carrito
          cartTotalElement.textContent = total;
      }
  }

  // Puedes llamar a updateCartUI al cargar la página para inicializar la interfaz
  updateCartUI();
});

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
            if (cart.sidebar.style.right === '0px') {
                hideCartSidebar();
            } else {
                showCartSidebar();
            }
        }
    
        function showCartSidebar() {
            cart.sidebar.style.right = '0';
            cart.btn.classList.add('hidden');
        }
    
        function hideCartSidebar() {
            cart.sidebar.style.right = '-300px';
            cart.btn.classList.remove('hidden');
        }
    
        function handleClickEvents(event) {
            if (event.target.classList.contains('add-to-cart')) {
                addProductToCart(event.target);
            }
    
            if (event.target.classList.contains('remove-from-cart-sidebar')) {
                removeProductFromCart(event.target);
            }
    
            if (event.target.id === 'checkout-btn-sidebar') {
                checkout();
            }
    
            if (event.target.id === 'clear-cart-btn-sidebar') {
                clearCart();
            }
        }
    
        function addProductToCart(target) {
            const productName = target.getAttribute('data-name');
            const productMarca = target.getAttribute('data-marka');
            const productModeloa = target.getAttribute('data-modeloa');
            const productPrice = parseFloat(target.getAttribute('data-price'));
    
            const existingItem = cart.items.find(item => item.name === productName && item.marka === productMarca && item.modeloa === productModeloa);
    
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.items.push({ name: productName, marka: productMarca, modeloa: productModeloa, price: productPrice, quantity: 1 });
            }
    
            updateCartUI();
        }
    
        function removeProductFromCart(target) {
            const indexToRemove = parseInt(target.getAttribute('data-index'));
    
            cart.items.splice(indexToRemove, 1);
            updateCartUI();
        }
    
        function checkout() {
            // Redirige a la página de la pasarela de pago
            window.location.href = '../Pago/pago.php'; // Reemplaza con la URL correcta
        }
    
        function clearCart() {
            cart.items.length = 0;
            updateCartUI();
        }
    
        function updateCartUI() {
            cart.itemsElement.innerHTML = '';
    
            cart.items.forEach((item, index) => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `
                    <div>
                    <span id='produktua'>${item.name} - ${item.marka} - ${item.modeloa} - $${item.price.toFixed(2)} x ${item.quantity}</span>
                    <label class='remove-from-cart-sidebar' data-index='${index}'>✖️</label>
                    </div>
                `;
                cart.itemsElement.appendChild(listItem);
            });
    
            cart.totalElement.textContent = `Total: $${calculateTotal().toFixed(2)}`;
        }
    
        function calculateTotal() {
            return cart.items.reduce((total, item) => total + item.price * item.quantity, 0);
        }
    });
    

    
    /*TRADUCTOR*/
