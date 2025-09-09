<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Churros</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('build/assets/app-B_-z85ZJ.css') }}">
    <style>
      /* Hide scrollbar for Chrome, Safari and Opera */
      #product-grid::-webkit-scrollbar {
        display: none;
      }
      /* Hide scrollbar for IE, Edge and Firefox */
      #product-grid {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
      }
    </style>
</head>
<body class="bg-maroon-dark font-poppins text-gray-800">

    <!-- Main Content -->
    <main class="flex-1 pb-24">
        <div class="container mx-auto">
            <header class="flex justify-between items-center mb-4 p-4 sm:p-10">
                <a href="{{ route('about-us') }}">
                    <img src="{{ asset('images/Lunalur-Logo.png') }}" alt="Logo" class="h-12 w-12 rounded-full">
                </a>
                <a href="{{ route('login') }}" class="bg-maroon-accent hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300">Admin</a>
            </header>
            
            <!-- Product Section -->
            <section id="products" class="mb-12">
                <h2 class="text-3xl font-bold text-base-white mb-8 px-5 sm:px-10">All Item</h2>
                <div id="product-grid" class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 pl-5 pr-5 sm:pl-10 sm:pr-10">
                    @foreach($products as $index => $product)
                    <div class="snap-start flex-shrink-0 @if($index < count($products) - 1) mr-5 @endif" style="width: 300px;">
                        <div class="product-card bg-base-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full" data-product-id="{{ $product->id }}">
                            <div class="h-48 flex items-center justify-center" style="background-color: #d47e22;">
                                @if($product->image_url)
                                    <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="object-contain" style="height: 195px;">
                                @else
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l-1.586-1.586a2 2 0 00-2.828 0L6 14m6-6l.01.01"></path></svg>
                                @endif
                            </div>
                            <div class="p-4 flex-grow flex flex-col">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                                <p class="text-gray-600 text-sm mb-3 flex-grow">{{ $product->description }}</p>
                                <div class="mt-auto flex justify-between items-center">
                                    <p class="text-lg font-bold text-maroon-dark">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    <div class="cart-controls" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}">
                                        <button class="add-to-cart-btn bg-maroon-accent hover:bg-opacity-90 text-white font-bold py-2 px-3 rounded-lg transition-colors duration-300 text-sm">
                                            Tambah
                                        </button>
                                        <div class="quantity-controls hidden items-center">
                                            <button class="quantity-decrease bg-gray-200 text-gray-700 hover:bg-gray-300 font-bold py-1 px-3 rounded-l-lg">-</button>
                                            <span class="quantity-display bg-gray-100 text-gray-800 font-bold py-1 px-3">0</span>
                                            <button class="quantity-increase bg-gray-200 text-gray-700 hover:bg-gray-300 font-bold py-1 px-3 rounded-r-lg">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Order Form Section -->
            <section id="order-form" class="p-4 sm:p-10">
                <div class="w-full mx-auto bg-base-white p-6 rounded-xl shadow-lg text-center flex flex-col">
                    @if (session('success'))
                        <div class="flex-grow flex flex-col justify-center items-center">
                            <h2 class="text-2xl font-bold text-center mb-4 text-maroon-dark">{{ session('success') }}</h2>
                            <p class="text-gray-600 mb-6 text-sm">Untuk informasi lebih lanjut, silahkan hubungi nomor 0851-9131-0693</p>
                            <a href="https://wa.me/6285191310693" target="_blank" class="bg-maroon-accent hover:bg-opacity-90 text-white font-bold py-3 px-6 rounded-full transition-colors duration-300 text-base mb-4 w-full">
                                Hubungi via WhatsApp
                            </a>
                            <a href="{{ url('/') }}" class="bg-maroon-accent hover:bg-opacity-90 text-white font-bold py-3 px-6 rounded-full transition-colors duration-300 text-base w-full">
                                Kembali Memesan
                            </a>
                        </div>
                    @else
                        {{-- Display Validation Errors --}}
                        @if ($errors->any())
                            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-left text-sm" role="alert">
                                <strong class="font-bold">Oops! Ada beberapa kesalahan:</strong>
                                <ul class="list-disc list-inside mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div>
                            <h2 class="text-3xl font-bold text-center mb-6 text-maroon-dark">Pesanan</h2>
                            <form action="{{ route('order.store') }}" method="POST">
                                @csrf
                                <div class="mb-4 text-left">
                                    <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                    <input type="text" name="customer_name" id="customer_name" class="w-full bg-gray-100 border border-gray-300 rounded-md py-2 px-3 text-gray-800 focus:outline-none focus:border-maroon-accent" required>
                                </div>
                                <div class="mb-4 text-left">
                                    <label for="customer_address" class="block text-sm font-medium text-gray-700 mb-1">Alamat Pengiriman</label>
                                    <textarea name="customer_address" id="customer_address" rows="3" class="w-full bg-gray-100 border border-gray-300 rounded-md py-2 px-3 text-gray-800 focus:outline-none focus:border-maroon-accent" required></textarea>
                                </div>
                                <div class="mb-6 text-left">
                                    <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp</label>
                                    <input type="text" name="customer_phone" id="customer_phone" class="w-full bg-gray-100 border border-gray-300 rounded-md py-2 px-3 text-gray-800 focus:outline-none focus:border-maroon-accent" required>
                                </div>
                                
                                <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                                    <h4 class="block text-lg font-bold text-maroon-dark mb-3">Ringkasan Pesanan Anda</h4>
                                    <div id="cart-items" class="text-gray-600 space-y-2 text-sm">
                                        <p id="cart-empty-msg">Keranjang Anda kosong.</p>
                                    </div>
                                    <div class="border-t border-gray-300 mt-4 pt-4 text-right">
                                        <p class="text-lg font-bold text-maroon-dark">Total: <span id="cart-total">Rp 0</span></p>
                                    </div>
                                </div>

                                <input type="hidden" name="cart" id="cart-input">

                                <div class="text-center">
                                    <button type="submit" class="bg-maroon-accent hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-full transition-colors duration-300 text-lg w-full">Buat Pesanan</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </section>

             <footer class="text-center mt-12 text-gray-400 text-xs px-4">
                <p class="mb-2">Pemesanan bersifat Pre-Order dan akan diproses pada hari Sabtu dan Minggu dari pukul 09.00 s/d 13.00</p>
                <p>Hanya untuk wilayah sekitar kota Banjarnegara</p>
            </footer>
        </div>
    </main>

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 inset-x-0 bg-base-white shadow-t-lg flex justify-around items-center h-16 z-50">
        <a href="#products" class="flex flex-col items-center justify-center text-gray-600 hover:text-maroon-accent font-medium">
            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            <span class="text-xs">All Item</span>
        </a>
        <a href="#order-form" class="flex flex-col items-center justify-center text-gray-600 hover:text-maroon-accent font-medium">
            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            <span class="text-xs">Pesanan</span>
        </a>
    </nav>

    <script>
    // Cart functionality remains the same
    document.addEventListener('DOMContentLoaded', () => {
        let cart = [];
        const productGrid = document.getElementById('product-grid');
        const cartItemsContainer = document.getElementById('cart-items');
        const cartEmptyMsg = document.getElementById('cart-empty-msg');
        const cartTotalEl = document.getElementById('cart-total');
        const cartInput = document.getElementById('cart-input');

        productGrid.addEventListener('click', (e) => {
            const controls = e.target.closest('.cart-controls');
            if (!controls) return;

            const id = controls.dataset.id;
            const name = controls.dataset.name;
            const price = parseInt(controls.dataset.price);

            if (e.target.classList.contains('add-to-cart-btn') || e.target.classList.contains('quantity-increase')) {
                const existingItem = cart.find(item => item.id === id);
                if (existingItem) {
                    existingItem.quantity++;
                } else {
                    cart.push({ id, name, price, quantity: 1 });
                }
            } else if (e.target.classList.contains('quantity-decrease')) {
                const existingItem = cart.find(item => item.id === id);
                if (existingItem) {
                    existingItem.quantity--;
                    if (existingItem.quantity === 0) {
                        cart = cart.filter(item => item.id !== id);
                    }
                }
            }
            updateUI();
        });

        function updateUI() {
            updateCartCards();
            updateCartSummary();
        }

        function updateCartCards() {
            document.querySelectorAll('.product-card').forEach(card => {
                const id = card.dataset.productId;
                const itemInCart = cart.find(item => item.id === id);
                
                const addBtn = card.querySelector('.add-to-cart-btn');
                const quantityControls = card.querySelector('.quantity-controls');
                const quantityDisplay = card.querySelector('.quantity-display');

                if (itemInCart) {
                    addBtn.classList.add('hidden');
                    quantityControls.classList.remove('hidden');
                    quantityDisplay.textContent = itemInCart.quantity;
                } else {
                    addBtn.classList.remove('hidden');
                    quantityControls.classList.add('hidden');
                }
            });
        }

        function updateCartSummary() {
            if (cart.length === 0) {
                cartEmptyMsg.style.display = 'block';
                cartItemsContainer.innerHTML = '';
                cartItemsContainer.appendChild(cartEmptyMsg);
                cartTotalEl.textContent = 'Rp 0';
            } else {
                cartEmptyMsg.style.display = 'none';
                cartItemsContainer.innerHTML = '';
                let total = 0;

                cart.forEach(item => {
                    const itemEl = document.createElement('div');
                    itemEl.className = 'flex justify-between items-center';
                    itemEl.innerHTML = `
                        <span>${item.name} x ${item.quantity}</span>
                        <span>Rp ${new Intl.NumberFormat('id-ID').format(item.price * item.quantity)}</span>
                    `;
                    cartItemsContainer.appendChild(itemEl);
                    total += item.price * item.quantity;
                });

                cartTotalEl.textContent = `Rp ${new Intl.NumberFormat('id-ID').format(total)}`;
            }
            cartInput.value = JSON.stringify(cart);
        }
    });
    </script>
</body>
</html>