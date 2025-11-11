// Cart functionality
document.addEventListener('DOMContentLoaded', function() {
    // Update cart quantity
    const quantityInputs = document.querySelectorAll('.quantity-input');
    quantityInputs.forEach(input => {
        input.addEventListener('change', function() {
            updateCartTotal();
        });
    });

    // Add to cart form validation
    const addToCartForms = document.querySelectorAll('.add-to-cart-form');
    addToCartForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const quantity = form.querySelector('input[name="quantity"]').value;
            if(quantity < 1) {
                e.preventDefault();
                alert('Please enter a valid quantity');
            }
        });
    });
});

function updateCartTotal() {
    // Implement cart total update logic
    console.log('Updating cart total...');
}

// Search functionality
function searchProducts() {
    const searchTerm = document.getElementById('search-input').value.toLowerCase();
    const products = document.querySelectorAll('.product-card');
    
    products.forEach(product => {
        const title = product.querySelector('.product-title').textContent.toLowerCase();
        if(title.includes(searchTerm)) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
}

// Image zoom functionality
function initImageZoom() {
    const productImages = document.querySelectorAll('.product-image');
    productImages.forEach(img => {
        img.addEventListener('click', function() {
            this.classList.toggle('zoomed');
        });
    });
}