document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.awea-remove-item').forEach(function(link) {
        link.addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to remove this item from your cart?')) {
                e.preventDefault();
            }
        });
    });
});

document.addEventListener('click', function(e) {
    // Check for minus button
    if (e.target.classList.contains('awea-qty-minus') || e.target.classList.contains('awea-qty-plus')) {
        const input = e.target.parentNode.querySelector('.awea-quantity-input');
        let currentValue = parseInt(input.value, 10) || 0;

        if (e.target.classList.contains('awea-qty-plus')) {
            currentValue++;
        } else if (e.target.classList.contains('awea-qty-minus')) {
            currentValue = currentValue > 0 ? currentValue - 1 : 0;
        }

        input.value = currentValue;

        // Optionally, trigger input event if you want WooCommerce to detect change
        input.dispatchEvent(new Event('change'));
    }
});
