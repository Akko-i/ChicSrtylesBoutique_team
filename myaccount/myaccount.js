
// Form validation
function validateContactForm() {
    let isValid = true;

    const firstName = document.getElementById('firstName');
    const lastName = document.getElementById('lastName');
    const email = document.getElementById('email');
    const currentPassword = document.getElementById('currentPassword');
    const newPassword = document.getElementById('newPassword');
    const confirmNewPassword = document.getElementById('confirmNewPassword');

    if (!firstName.value.trim()) {
        document.getElementById('firstNameError').style.display = 'block';
        isValid = false;
    } else {
        document.getElementById('firstNameError').style.display = 'none';
    }

    if (!lastName.value.trim()) {
        document.getElementById('lastNameError').style.display = 'block';
        isValid = false;
    } else {
        document.getElementById('lastNameError').style.display = 'none';
    }

    if (!email.value.trim() || !/\S+@\S+\.\S+/.test(email.value)) {
        document.getElementById('emailError').style.display = 'block';
        isValid = false;
    } else {
        document.getElementById('emailError').style.display = 'none';
    }

    if (!currentPassword.value.trim()) {
        document.getElementById('currentPasswordError').style.display = 'block';
        isValid = false;
    } else {
        document.getElementById('currentPasswordError').style.display = 'none';
    }

    if (!newPassword.value.trim() || newPassword.value.length < 6) {
        document.getElementById('newPasswordError').style.display = 'block';
        isValid = false;
    } else {
        document.getElementById('newPasswordError').style.display = 'none';
    }

    if (confirmNewPassword.value !== newPassword.value) {
        document.getElementById('confirmNewPasswordError').style.display = 'block';
        isValid = false;
    } else {
        document.getElementById('confirmNewPasswordError').style.display = 'none';
    }

    return isValid;
}


// Password visibility toggle
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.password-toggle-icon').forEach(icon => {
        icon.addEventListener('click', function () {
            const passwordField = this.previousElementSibling;
            const iconImage = this.querySelector('img');

            if (passwordField && iconImage) {
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    iconImage.src = '../img/login/icon_eye-close.svg'; // Change to eye-close icon
                } else {
                    passwordField.type = 'password'; // Hide the password
                    iconImage.src = '../img/login/icon_eye-open.svg'; // Change to eye-open icon
                }
            } else {
                console.error("Password field or toggle icon not found.");
            }
        });
    });
});


// Billing address page
function validateBillingForm() {
    let isValid = true;

    const fields = [
        { id: 'firstName', errorId: 'firstNameError', message: 'Please enter your first name.' },
        { id: 'lastName', errorId: 'lastNameError', message: 'Please enter your last name.' },
        { id: 'phone', errorId: 'phoneError', message: 'Please enter a valid phone number.' },
        { id: 'email', errorId: 'emailError', message: 'Please enter a valid email address.' },
        { id: 'country', errorId: 'countryError', message: 'Please select your country/region.' },
        { id: 'addressLine1', errorId: 'addressError', message: 'Please enter your street address.' },
        { id: 'suburb', errorId: 'suburbError', message: 'Please enter your suburb.' },
        { id: 'state', errorId: 'stateError', message: 'Please select your state.' },
        { id: 'postcode', errorId: 'postcodeError', message: 'Please enter your post code.' },
    ];

    fields.forEach(field => {
        const element = document.getElementById(field.id);
        const errorElement = document.getElementById(field.errorId);

        if (!element.value.trim()) {
            errorElement.textContent = field.message;
            errorElement.style.display = 'block';
            isValid = false;
        } else {
            errorElement.style.display = 'none';
        }
    });

    return isValid;
}
