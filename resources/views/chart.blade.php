<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-4">Pesanan Anda</h2>
        <ul id="cartItems"></ul>
        <div class="text-xl font-semibold mt-4" id="totalPrice">Total Harga: Rp 0</div>
        <button class="bg-green-500 text-white font-bold px-4 py-2 mt-4" onclick="checkout()">Checkout</button>
    </div>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        var cart = {};
        var total = 0;

        function incrementQuantity(menuId) {
            var quantityElement = document.getElementById('quantity' + menuId);
            var currentQuantity = parseInt(quantityElement.innerText);
            quantityElement.innerText = currentQuantity + 1;
        }

        function decrementQuantity(menuId) {
            var quantityElement = document.getElementById('quantity' + menuId);
            var currentQuantity = parseInt(quantityElement.innerText);
            if (currentQuantity > 0) {
                quantityElement.innerText = currentQuantity - 1;
            }
        }

        function addToCart(menuId, menuName, menuPrice) {
            var quantityElement = document.getElementById('quantity' + menuId);
            var quantity = parseInt(quantityElement.innerText);

            if (quantity > 0) {
                var itemPrice = menuPrice * quantity;
                cart[menuId] = {
                    name: menuName,
                    price: itemPrice,
                    quantity: quantity
                };

                updateCartUI();
            }
        }

        function updateCartUI() {
            var cartItemsElement = document.getElementById('cartItems');
            cartItemsElement.innerHTML = '';

            total = 0;

            for (var menuId in cart) {
                if (cart.hasOwnProperty(menuId)) {
                    var menuItem = cart[menuId];
                    total += menuItem.price;

                    var listItem = document.createElement('li');
                    listItem.innerHTML = menuItem.name + ' x' + menuItem.quantity + ' = Rp ' + menuItem.price;
                    cartItemsElement.appendChild(listItem);
                }
            }

            var totalPriceElement = document.getElementById('totalPrice');
            totalPriceElement.innerText = 'Total Harga: Rp ' + total;
        }

        // function checkout() {
        //     if (total > 0) {
        //         // Lakukan logika checkout sesuai kebutuhan Anda, misalnya menyimpan pesanan ke database.
        //         // Di sini, Anda dapat mengakses data pesanan melalui variabel "cart" dan total harga melalui "total".
        //         console.log("Pesanan Anda:", cart);
        //         console.log("Total Harga: Rp", total);

        //         // Reset keranjang pesanan
        //         cart = {}; 
        //         total = 0;
        //         updateCartUI();

        //         alert("Pesanan Anda telah diterima.");
        //     } else {
        //         alert("Keranjang pesanan Anda kosong. Silakan pesan makanan terlebih dahulu.");
        //     }
        // }

        function checkout() {
            if (total > 0) {
                // Simpan pesanan ke basis data
                var userId = {{ Auth::id() }}; // Mengambil ID pengguna yang sedang masuk
                var orders = Object.values(cart); // Menjadikan pesanan sebagai array
                console.log(orders);
                axios.post('/orders', {
                    user_id: userId,
                    orders: orders,
                    total: total
                })
                .then(function (response) {
                    // Reset keranjang pesanan setelah berhasil
                    cart = {};
                    total = 0;
                    updateCartUI();

                    alert("Pesanan Anda telah diterima.");
                })
                .catch(function (error) {
                    console.error(error.response.data);
                    alert("Gagal menyimpan pesanan.");
                });
            } else {
                alert("Keranjang pesanan Anda kosong. Silakan pesan makanan terlebih dahulu.");
            }
        }

    </script>
</x-app-layout>