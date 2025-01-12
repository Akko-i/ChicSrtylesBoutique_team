document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("checkoutForm");

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const isValid = validateForm();

        if (isValid) {
            // Redirect to thank you page if form is valid
            window.location.href = "thankyou.html";
        }
    });

    function validateForm() {
        let isValid = true;

        const requiredFields = form.querySelectorAll("[required]");
        
        form.querySelectorAll(".error-message").forEach((message) => {
            message.style.display = "none";
        });

        requiredFields.forEach((field) => {
            const errorMessage = document.getElementById(`${field.id}Error`);

            if (!field.value.trim()) {
                if (errorMessage) {
                    errorMessage.style.display = "block";
                }
                isValid = false;
            } else if (field.type === "email" && !/\S+@\S+\.\S+/.test(field.value)) {
                if (errorMessage) {
                    errorMessage.textContent = "Please enter a valid email address.";
                    errorMessage.style.display = "block";
                }
                isValid = false;
            } else if (field.id === "phone" && !/^(?:\+61|0)[2-478](?:[ -]?[0-9]){8}$/.test(field.value)) {
                if (errorMessage) {
                    errorMessage.textContent = "Please enter a valid phone number (e.g., 04xx xxx xxx).";
                    errorMessage.style.display = "block";
                }
                isValid = false;
            } else if (
                (field.id === "billingPostcode" || field.id === "postcode") &&
                !/^\d{4}$/.test(field.value)
            ) {
                if (errorMessage) {
                    errorMessage.textContent = "Please enter a valid post code.";
                    errorMessage.style.display = "block";
                }
                isValid = false;
            } else if (
                field.id === "cardNumber" &&
                (!/^\d{16}$/.test(field.value) || field.value.trim().length !== 16)
            ) {
                if (errorMessage) {
                    errorMessage.textContent = "Please enter a valid 16-digit card number.";
                    errorMessage.style.display = "block";
                }
                isValid = false;
            } else if (field.id === "expiryDate" && !/^\d{2}\/\d{2}$/.test(field.value)) {
                if (errorMessage) {
                    errorMessage.textContent = "Please enter a valid expiry date (MM/YY).";
                    errorMessage.style.display = "block";
                }
                isValid = false;
            } else if (
                field.id === "cardCode" &&
                (!/^\d{3}$/.test(field.value) || field.value.trim().length !== 3)
            ) {
                if (errorMessage) {
                    errorMessage.textContent = "Please enter a valid 3-digit CVC.";
                    errorMessage.style.display = "block";
                }
                isValid = false;
            }
        });

        return isValid;
    }
});
