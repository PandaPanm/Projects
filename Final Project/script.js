document.addEventListener("DOMContentLoaded", () => {
    // Footer year
    const yearSpan = document.getElementById("year");
    if (yearSpan) {
        yearSpan.textContent = new Date().getFullYear();
    }

    // Dropdown "Why Your Help Matters" panel
    const whyHelpBtn = document.getElementById("whyHelpBtn");
    const whyHelpPanel = document.getElementById("why-help");

    if (whyHelpBtn && whyHelpPanel) {
        whyHelpBtn.addEventListener("click", () => {
            const isOpen = whyHelpPanel.classList.toggle("open");
            // Optional: change button text when open/closed
            whyHelpBtn.textContent = isOpen ? "Hide Why Your Help Matters" : "Why Your Help Matters";
        });
    }

    // Live total price for sponsor form
    const packageSelect = document.getElementById("packageSelect");
    const quantityInput = document.getElementById("quantity");
    const totalPrice = document.getElementById("totalPrice");

    function updateTotal() {
        if (!packageSelect || !quantityInput || !totalPrice) return;

        const selectedOption = packageSelect.options[packageSelect.selectedIndex];
        const price = parseFloat(selectedOption.getAttribute("data-price")) || 0;
        const qty = parseInt(quantityInput.value) || 0;
        const total = price * qty;

        totalPrice.textContent = `Total: $${total.toFixed(2)}`;
    }

    if (packageSelect && quantityInput) {
        packageSelect.addEventListener("change", updateTotal);
        quantityInput.addEventListener("input", updateTotal);
        updateTotal();
    }
});
