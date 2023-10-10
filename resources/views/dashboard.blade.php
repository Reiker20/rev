<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesan Makanan Sekarang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-900">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($menus as $menu)
                            <div class="p-3">
                                <div class="block hover:bg-gray-300 rounded-lg shadow-lg p-4">
                                    <img src="{{ asset($menu->image) }}" alt="menu"
                                        class="rounded-lg mb-3 w-full h-80 object-cover">
                                    <h3 class="text-xl font-bold mb-2">{{ $menu->name }}</h3>
                                    <p class="text-gray-700 text-base">{{ $menu->price }}</p>
                                    <p class="text-gray-700 text-base">{{ $menu->category->name }}</p>
                                    <br>
                                    <div class="flex justify-between items-center mt-4">
                                        <div class="flex items-center">
                                            <button class="bg-green-500 text-white font-bold px-2 rounded-l"
                                                onclick="decrementQuantity({{ $menu->id }})">-</button>
                                            <span id="quantity{{ $menu->id }}" class="bg-gray-100 p-2">0</span>
                                            <button class="bg-blue-500 text-white font-bold px-2 rounded-r"
                                                onclick="incrementQuantity({{ $menu->id }})">+</button>
                                        </div>
                                    </div>
                                    <button class="bg-blue-500 hover:bg-gray-200 text-white font-bold px-4 py-2 mt-4"
                                        onclick="addToCart({{ $menu->id }} , '{{ $menu->name }}', {{ $menu->price }})">Pesan</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Pesanan -->
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-4">Pesanan Anda</h2>
        <ul id="cartItems"></ul>
        <div class="text-xl font-semibold mt-4" id="totalPrice">Total Harga: Rp 0</div>
        <button class="bg-green-500 text-white font-bold px-4 py-2 mt-4" onclick="checkout()">Checkout</button>
    </div>

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

        function checkout() {
            if (total > 0) {
                // Lakukan logika checkout sesuai kebutuhan Anda, misalnya menyimpan pesanan ke database.
                // Di sini, Anda dapat mengakses data pesanan melalui variabel "cart" dan total harga melalui "total".
                console.log("Pesanan Anda:", cart);
                console.log("Total Harga: Rp", total);

                // Reset keranjang pesanan
                cart = {}; 
                total = 0;
                updateCartUI();

                alert("Pesanan Anda telah diterima.");
            } else {
                alert("Keranjang pesanan Anda kosong. Silakan pesan makanan terlebih dahulu.");
            }
        }
    </script>
</x-app-layout>
