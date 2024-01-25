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
        // Variables
        const cartItems = [];
        const cartSidebar = document.getElementById('cart-sidebar');
        const cartItemsSidebarElement = document.getElementById('cart-items-sidebar');
        const cartTotalSidebarElement = document.getElementById('cart-total-sidebar');
        const cartSidebarBtn = document.getElementById('cart-sidebar-btn');
        const cartCloseBtn = document.querySelector('.btn-close');
    
        // Eventos
        cartSidebarBtn.addEventListener('click', toggleCartSidebar);
        cartCloseBtn.addEventListener('click', toggleCartSidebar);
        document.addEventListener('click', handleClickEvents);
    
        // Funciones
        function toggleCartSidebar() {
            const cartSidebar = document.getElementById('cart-sidebar');
            const cartSidebarBtn = document.getElementById('cart-sidebar-btn');
    
            if (cartSidebar.style.right === '0px') {
                cartSidebar.style.right = '-300px'; // Ocultar el sidebar
                cartSidebarBtn.classList.remove('hidden'); // Mostrar el botón de carrito al cerrar el sidebar
            } else {
                cartSidebar.style.right = '0'; // Mostrar el sidebar
                cartSidebarBtn.classList.add('hidden'); // Ocultar el botón de carrito al abrir el sidebar
            }
        }
    
        function addProductToCart(target) {
            const productName = target.getAttribute('data-name');
            const productPrice = parseFloat(target.getAttribute('data-price'));
    
            cartItems.push({ name: productName, price: productPrice });
            toggleCartSidebar(); // Abre la barra lateral
            updateCartSidebarUI();
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
        const productPrice = parseFloat(target.getAttribute('data-price'));

        cartItems.push({ name: productName, price: productPrice });
        updateCartSidebarUI();
    }

    function removeProductFromCart(target) {
        const indexToRemove = parseInt(target.getAttribute('data-index'));

        cartItems.splice(indexToRemove, 1);
        updateCartSidebarUI();
    }

    function checkout() {
        alert('Compra realizada por $' + calculateTotal());
        cartItems.length = 0;
        updateCartSidebarUI();
    }

    function clearCart() {
        cartItems.length = 0;
        updateCartSidebarUI();
    }

    function updateCartSidebarUI() {
        cartItemsSidebarElement.innerHTML = '';

        cartItems.forEach((item, index) => {
            const listItem = document.createElement('li');
            listItem.innerHTML = `
                <span>${item.name} - $${item.price.toFixed(2)}</span>
                <button class='remove-from-cart-sidebar' data-index='${index}'>Eliminar</button>
            `;
            cartItemsSidebarElement.appendChild(listItem);
        });

        cartTotalSidebarElement.textContent = `Total: $${calculateTotal().toFixed(2)}`;
    }

    function calculateTotal() {
        return cartItems.reduce((total, item) => total + item.price, 0);
    }
});

    