import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const cart = {};
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalEl = document.getElementById('cart-total');
    const cartEmptyMsg = document.getElementById('cart-empty-msg');
    const cartInput = document.getElementById('cart-input');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;
            const name = button.dataset.name;
            const price = parseInt(button.dataset.price);

            if (cart[id]) {
                cart[id].quantity++;
            } else {
                cart[id] = {
                    name: name,
                    price: price,
                    quantity: 1
                };
            }
            updateCartView();
        });
    });

    function updateCartView() {
        if (Object.keys(cart).length === 0) {
            cartItemsContainer.innerHTML = '<p id="cart-empty-msg">Keranjang Anda kosong.</p>';
            cartTotalEl.innerText = 'Rp 0';
            cartInput.value = '';
            return;
        }

        if(cartEmptyMsg) cartEmptyMsg.style.display = 'none';
        cartItemsContainer.innerHTML = '';
        let total = 0;

        for (const id in cart) {
            const item = cart[id];
            total += item.price * item.quantity;

            const itemEl = document.createElement('div');
            itemEl.className = 'flex justify-between items-center mb-2';
            itemEl.innerHTML = `
                <div>
                    <p class="font-bold">${item.name}</p>
                    <p class="text-xs text-gray-400">Rp ${number_format(item.price)}</p>
                </div>
                <div class="flex items-center">
                    <button type="button" class="cart-quantity-btn bg-gray-600 w-6 h-6 rounded-full" data-id="${id}" data-action="decrease">-</button>
                    <span class="mx-2">${item.quantity}</span>
                    <button type="button" class="cart-quantity-btn bg-gray-600 w-6 h-6 rounded-full" data-id="${id}" data-action="increase">+</button>
                </div>
            `;
            cartItemsContainer.appendChild(itemEl);
        }

        cartTotalEl.innerText = `Rp ${number_format(total)}`;
        cartInput.value = JSON.stringify(Object.keys(cart).map(id => ({ id, quantity: cart[id].quantity })));
    }
    
    cartItemsContainer.addEventListener('click', (e) => {
        if (e.target.classList.contains('cart-quantity-btn')) {
            const id = e.target.dataset.id;
            const action = e.target.dataset.action;

            if (cart[id]) {
                if (action === 'increase') {
                    cart[id].quantity++;
                } else if (action === 'decrease') {
                    cart[id].quantity--;
                    if (cart[id].quantity <= 0) {
                        delete cart[id];
                    }
                }
                updateCartView();
            }
        }
    });

    function number_format(number) {
        return new Intl.NumberFormat('id-ID').format(number);
    }
});