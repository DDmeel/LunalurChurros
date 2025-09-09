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
    <script src="https://cdn.jsdelivr.net/npm/siema@1.5.1/dist/siema.min.js"></script>
</head>
<body class="bg-maroon-dark font-poppins text-gray-800">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-24 bg-base-white flex-shrink-0 flex flex-col items-center py-6 border-r border-gray-100 sticky top-0 h-screen">
            <a href="{{ route('about-us') }}">
                <img src="{{ asset('images/Lunalur-Logo.png') }}" alt="Logo" class="h-16 w-16 rounded-full mb-10">
            </a>
            <nav class="flex flex-col items-center space-y-16">
                <a href="#products" class="text-gray-600 hover:text-maroon-accent font-semibold" style="writing-mode: vertical-rl; transform: rotate(180deg);">
                    All Item
                </a>
                <a href="#order-form" class="text-gray-600 hover:text-maroon-accent font-semibold" style="writing-mode: vertical-rl; transform: rotate(180deg);">
                    Pesanan
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            <div class="container mx-auto">
                <header class="flex justify-end mb-4">
                    <a href="{{ route('login') }}" class="bg-maroon-accent hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300">Admin</a>
                </header>
                
                <!-- Product Section -->
                <section id="products" class="mb-12">
                    <h2 class="text-3xl font-bold text-base-white mb-8">All Item</h2>
                    <div id="product-grid" class="flex overflow-x-auto space-x-8 sm:grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 sm:gap-8 sm:space-x-0 sm:justify-items-start">
                        @foreach($products as $product)
                        <div class="product-card bg-base-white rounded-xl shadow-lg overflow-hidden flex flex-col" data-product-id="{{ $product->id }}" style="width: 300px; height: 432px;">
                            <div class="h-48 flex items-center justify-center" style="background-color: #d47e22;">
                                @if($product->image_url)
                                    <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="object-contain" style="height: 195px;">
                                @else
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l-1.586-1.586a2 2 0 00-2.828 0L6 14m6-6l.01.01"></path></svg>
                                @endif
                            </div>
                            <div class="p-6 flex-grow">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                                <p class="text-gray-600 text-sm mb-4">{{ $product->description }}</p>
                            </div>
                            <div class="px-6 pb-6 flex justify-between items-center">
                                <p class="text-xl font-bold text-maroon-dark">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                <div class="cart-controls" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}">
                                    <button class="add-to-cart-btn bg-maroon-accent hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300">
                                        Tambah
                                    </button>
                                    <div class="quantity-controls hidden items-center">
                                        <button class="quantity-decrease bg-gray-200 text-gray-700 hover:bg-gray-300 font-bold py-2 px-4 rounded-l-lg">-</button>
                                        <span class="quantity-display bg-gray-100 text-gray-800 font-bold py-2 px-4">0</span>
                                        <button class="quantity-increase bg-gray-200 text-gray-700 hover:bg-gray-300 font-bold py-2 px-4 rounded-r-lg">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- Order Form Section -->
                <section id="order-form">
                    <div class="max-w-2xl mx-auto bg-base-white p-8 rounded-xl shadow-lg text-center min-h-[580px] flex flex-col">
                        @if (session('success'))
                            <div class="flex-grow flex flex-col justify-center items-center">
                                <h2 class="text-3xl font-bold text-center mb-4 text-maroon-dark">{{ session('success') }}</h2>
                                <p class="text-gray-600 mb-8">Untuk informasi lebih lanjut, silahkan hubungi nomor 0851-9131-0693</p>
                                <a href="https://wa.me/6285191310693" target="_blank" class="bg-maroon-accent hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-full transition-colors duration-300 text-lg mb-4">
                                    Hubungi via WhatsApp
                                </a>
                                <a href="{{ url('/') }}" class="bg-maroon-accent hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-full transition-colors duration-300 text-lg">
                                    Kembali Memesan
                                </a>
                            </div>
                        @else
                            {{-- Display Validation Errors --}}
                            @if ($errors->any())
                                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-left" role="alert">
                                    <strong class="font-bold">Oops! Ada beberapa kesalahan:</strong>
                                    <ul class="list-disc list-inside mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div>
                                <h2 class="text-3xl font-bold text-center mb-8 text-maroon-dark">Pesanan</h2>
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
                                        <div id="cart-items" class="text-gray-600 space-y-2">
                                            <p id="cart-empty-msg">Keranjang Anda kosong.</p>
                                        </div>
                                        <div class="border-t border-gray-300 mt-4 pt-4 text-right">
                                            <p class="text-xl font-bold text-maroon-dark">Total: <span id="cart-total">Rp 0</span></p>
                                        </div>
                                    </div>

                                    <input type="hidden" name="cart" id="cart-input">

                                    <div class="text-center">
                                        <button type="submit" class="bg-maroon-accent hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-full transition-colors duration-300 text-lg">Buat Pesanan</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </section>

                 <footer class="text-center mt-12 text-gray-400 text-sm">
                    <p class="mb-2">Pemesanan bersifat Pre-Order dan akan diproses pada hari Sabtu dan Minggu dari pukul 09.00 s/d 13.00</p>
                    <p>Hanya untuk wilayah sekitar kota Banjarnegara</p>
                </footer>
            </div>
        </main>
    </div>

        <script>
    document.addEventListener('DOMContentLoaded', () => {
        let cart = [];
        const productGrid = document.getElementById('product-grid');
        const cartItemsContainer = document.getElementById('cart-items');
        const cartEmptyMsg = document.getElementById('cart-empty-msg');
        const cartTotalEl = document.getElementById('cart-total');
        const cartInput = document.getElementById('cart-input');

        // Use event delegation for cart controls
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
                cartTotalEl.textContent = 'Rp 0'; // Bug fix: Reset total to 0
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
    <script>
        new Siema({
            selector: '#product-grid',
            duration: 200,
            easing: 'ease-out',
            perPage: {
                320: 1,
                768: 2,
                1024: 3,
                1280: 4,
            },
            loop: true,
        });
    </script>
</body>
</html>