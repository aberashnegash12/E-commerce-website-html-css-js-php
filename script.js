// DOM Elements
const searchBtn = document.getElementById('search-btn');
const closeSearch = document.getElementById('close-search');
const searchForm = document.getElementById('search-form');
const cartBtn = document.getElementById('cart-btn');
const closeCart = document.getElementById('close-cart');
const cartSidebar = document.getElementById('cart-sidebar');
const productContainer = document.getElementById('product-container');
const cartItems = document.getElementById('cart-items');
const cartTotal = document.getElementById('cart-total');
const cartCount = document.getElementById('cart-count');
const filterBtns = document.querySelectorAll('.filter-btn');

// Product Data
const products = [
    {
        id: 1,
        title: "Wireless Headphones",
        price: 99.99,
        category: "electronics",
        image: "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
    },
    {
        id: 2,
        title: "Smart Watch",
        price: 199.99,
        category: "electronics",
        image: "https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
    },
    {
        id: 3,
        title: "Cotton T-Shirt",
        price: 29.99,
        category: "clothing",
        image: "https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
    },
    {
        id: 4,
        title: "Denim Jeans",
        price: 59.99,
        category: "clothing",
        image: "https://images.unsplash.com/photo-1542272604-787c3835535d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
    },
    {
        id: 5,
        title: "Coffee Table",
        price: 149.99,
        category: "home",
        image: "https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
    },
    {
        id: 6,
        title: "Throw Pillow",
        price: 19.99,
        category: "home",
        image: "https://images.unsplash.com/photo-1579656592043-a20e25a4aa4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
    },
    {
        id: 7,
        title: "Bluetooth Speaker",
        price: 79.99,
        category: "electronics",
        image: "https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
    },
    {
        id: 8,
        title: "Running Shoes",
        price: 89.99,
        category: "clothing",
        image: "https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
    }
];

// Cart
let cart = [];

// Event Listeners
searchBtn.addEventListener('click', () => {
    searchForm.classList.add('active');
});

closeSearch.addEventListener('click', () => {
    searchForm.classList.remove('active');
});

cartBtn.addEventListener('click', () => {
    cartSidebar.classList.add('active');
});

closeCart.addEventListener('click', () => {
    cartSidebar.classList.remove('active');
});

filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        // Remove active class from all buttons
        filterBtns.forEach(btn => btn.classList.remove('active'));
        // Add active class to clicked button
        btn.classList.add('active');
        
        const filter = btn.getAttribute('data-filter');
        displayProducts(filter);
    });
});

// Update the displayProducts function to fetch from API
async function displayProducts(filter = 'all') {
    const container = document.getElementById('product-container') || 
                     document.getElementById('product-grid');
    
    if (!container) return;
    
    try {
        const response = await fetch('api/products.php');
        const data = await response.json();
        
        if (!data.success) throw new Error(data.message);
        
        container.innerHTML = '';
        
        const filteredProducts = filter === 'all' 
            ? data.data 
            : data.data.filter(product => product.category === filter);
        
        filteredProducts.forEach(product => {
            const productCard = document.createElement('div');
            productCard.classList.add('product-card');
            productCard.setAttribute('data-category', product.category);
            productCard.innerHTML = `
                <div class="product-image">
                    <img src="${product.image_url}" alt="${product.title}">
                </div>
                <div class="product-info">
                    <h3 class="product-title">${product.title}</h3>
                    <div class="product-price">
                        <span class="current-price">$${product.price.toFixed(2)}</span>
                    </div>
                    <button class="add-to-cart" data-id="${product.id}">Add to Cart</button>
                </div>
            `;
            container.appendChild(productCard);
        });
        
        // Add event listeners to all add-to-cart buttons
        document.querySelectorAll('.add-to-cart').forEach(btn => {
            btn.addEventListener('click', addToCart);
        });
    } catch (error) {
        console.error('Error loading products:', error);
        container.innerHTML = '<p>Error loading products. Please try again.</p>';
    }
}
// Add to Cart
async function addToCart(e) {
    const id = parseInt(e.target.getAttribute('data-id'));
    
    try {
        const response = await fetch('api/cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                product_id: id,
                quantity: 1
            })
        });
        
        const data = await response.json();
        
        if (!data.success) throw new Error(data.message);
        
        updateCart();
        showAlert('Product added to cart');
    } catch (error) {
        console.error('Error adding to cart:', error);
        showAlert('Failed to add to cart');
    }
}

// Update Cart
async function updateCart() {
    try {
        const response = await fetch('api/cart.php');
        const data = await response.json();
        
        if (!data.success) throw new Error(data.message);
        
        cartItems.innerHTML = '';
        
        let total = 0;
        let itemCount = 0;
        
        data.data.forEach(item => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.innerHTML = `
                <img src="${item.image_url}" alt="${item.title}" class="cart-item-img">
                <div class="cart-item-details">
                    <h4 class="cart-item-title">${item.title}</h4>
                    <p class="cart-item-price">$${(item.price * item.quantity).toFixed(2)}</p>
                    <div class="cart-item-quantity">
                        <button class="quantity-btn minus" data-id="${item.id}">-</button>
                        <span>${item.quantity}</span>
                        <button class="quantity-btn plus" data-id="${item.id}">+</button>
                    </div>
                    <p class="remove-item" data-id="${item.id}">Remove</p>
                </div>
            `;
            cartItems.appendChild(cartItem);
            
            total += item.price * item.quantity;
            itemCount += item.quantity;
        });
        
        cartTotal.textContent = total.toFixed(2);
        cartCount.textContent = itemCount;
        
        // Add event listeners
        document.querySelectorAll('.minus').forEach(btn => {
            btn.addEventListener('click', decreaseQuantity);
        });
        
        document.querySelectorAll('.plus').forEach(btn => {
            btn.addEventListener('click', increaseQuantity);
        });
        
        document.querySelectorAll('.remove-item').forEach(btn => {
            btn.addEventListener('click', removeItem);
        });
    } catch (error) {
        console.error('Error updating cart:', error);
    }
}

// Remove Item
async function removeItem(e) {
    const id = parseInt(e.target.getAttribute('data-id'));
    
    try {
        const response = await fetch('api/cart.php', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                product_id: id
            })
        });
        
        const data = await response.json();
        
        if (!data.success) throw new Error(data.message);
        
        updateCart();
    } catch (error) {
        console.error('Error removing item:', error);
        showAlert('Failed to remove item');
    }
}
// Decrease Quantity
function decreaseQuantity(e) {
    const id = parseInt(e.target.getAttribute('data-id'));
    const item = cart.find(item => item.id === id);
    
    if (item.quantity > 1) {
        item.quantity -= 1;
    } else {
        cart = cart.filter(item => item.id !== id);
    }
    
    updateCart();
}

// Increase Quantity
function increaseQuantity(e) {
    const id = parseInt(e.target.getAttribute('data-id'));
    const item = cart.find(item => item.id === id);
    item.quantity += 1;
    updateCart();
}

// Show Alert
function showAlert(message) {
    const alert = document.createElement('div');
    alert.classList.add('alert');
    alert.textContent = message;
    document.body.appendChild(alert);
    
    setTimeout(() => {
        alert.remove();
    }, 3000);
}
// User Modal
const userBtn = document.getElementById('user-btn');
const userModal = document.getElementById('user-modal');
const closeUserModal = userModal.querySelector('.close-modal');
const tabBtns = userModal.querySelectorAll('.tab-btn');
const tabContents = userModal.querySelectorAll('.tab-content');

userBtn.addEventListener('click', () => {
    userModal.classList.add('active');
});

closeUserModal.addEventListener('click', () => {
    userModal.classList.remove('active');
});

tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        const tab = btn.getAttribute('data-tab');
        
        tabBtns.forEach(b => b.classList.remove('active'));
        tabContents.forEach(c => c.classList.remove('active'));
        
        btn.classList.add('active');
        document.getElementById(`${tab}-tab`).classList.add('active');
    });
});

// Login Form
document.getElementById('login-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const username = document.getElementById('login-username').value;
    const password = document.getElementById('login-password').value;
    
    try {
        const response = await fetch('api/auth.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `action=login&username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
        });
        
        const data = await response.json();
        
        if (!data.success) throw new Error(data.message);
        
        showAlert('Login successful');
        userModal.classList.remove('active');
        updateUserStatus();
    } catch (error) {
        showAlert(error.message);
    }
});

// Register Form
document.getElementById('register-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const username = document.getElementById('register-username').value;
    const email = document.getElementById('register-email').value;
    const password = document.getElementById('register-password').value;
    const confirm = document.getElementById('register-confirm').value;
    
    if (password !== confirm) {
        showAlert('Passwords do not match');
        return;
    }
    
    try {
        const response = await fetch('api/auth.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `action=register&username=${encodeURIComponent(username)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
        });
        
        const data = await response.json();
        
        if (!data.success) throw new Error(data.message);
        
        showAlert('Registration successful. Please login.');
        tabBtns[0].click(); // Switch to login tab
    } catch (error) {
        showAlert(error.message);
    }
});

// Checkout Button
document.querySelector('.checkout-btn').addEventListener('click', async () => {
    try {
        const response = await fetch('api/checkout.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            }
        });
        
        const data = await response.json();
        
        if (!data.success) throw new Error(data.message);
        
        showAlert(`Order placed successfully! Order ID: ${data.order_id}`);
        cartSidebar.classList.remove('active');
        updateCart();
    } catch (error) {
        showAlert(error.message);
    }
});

// Update user status in UI
function updateUserStatus() {
    const userBtn = document.getElementById('user-btn');
    // You would typically check session or make an API call to check auth status
    // For now, we'll just check if we have user data
    if (localStorage.getItem('user')) {
        const user = JSON.parse(localStorage.getItem('user'));
        userBtn.innerHTML = `<i class="fas fa-user"></i> ${user.username}`;
    }
}

// Initialize
displayProducts();