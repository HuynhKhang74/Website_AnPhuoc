document.addEventListener('DOMContentLoaded', function () {
    const quantityContainers = document.querySelectorAll('.quantity-container');

    quantityContainers.forEach(container => {
        const decreaseButton = container.querySelector('.decrease');
        const increaseButton = container.querySelector('.increase');
        const quantityInput = container.querySelector('.quantity-input');

        decreaseButton.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) { // Đảm bảo số lượng không nhỏ hơn 1
                quantityInput.value = currentValue - 1;
            }
        });

        increaseButton.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });

        quantityInput.addEventListener('input', function () {
            let currentValue = parseInt(quantityInput.value);
            if (isNaN(currentValue) || currentValue < 1) {
                quantityInput.value = 1;
            }
        });
    });
});
