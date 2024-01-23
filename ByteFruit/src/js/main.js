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

document.addEventListener('DOMContentLoaded', function () {
    const favoritesList = document.getElementById('favorites');
    const searchButton = document.getElementById('search-button');
    const filterButton = document.getElementById('filter-button');

    // Manejador para agregar productos a favoritos
    function addToFavorites(productName) {
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

    // Manejador para eliminar productos de favoritos
    function removeFromFavorites(button) {
      const productItem = button.parentNode;
      const favoritesList = productItem.parentNode;
      favoritesList.removeChild(productItem);

      // Ocultar la lista de favoritos si está vacía
      if (favoritesList.children.length === 0) {
        document.getElementById('favorites-list').style.display = 'none';
      }
    }

    // Agregar eventos para botones de búsqueda y filtro (puedes ajustar según tus necesidades)
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
  });