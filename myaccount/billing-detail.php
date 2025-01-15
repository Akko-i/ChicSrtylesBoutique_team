<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Details - Chic Style Boutique</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="myaccount.css">
    <script src="../script.js"></script>
    <script src="myaccount.js"></script>
</head>

<?php include '../config.php'; ?>
<?php include '../header.php'; ?>
<body data-base-url="<?php echo BASE_URL; ?>">

    <!-- background-overlay -->
    <div id="overlay"></div>

    <!-- breadcrumbs -->
    <nav class="breadcrumbs">
        <ol>
            <li><a href="../index.php">Home</a></li>
            <li>My Account</li>
        </ol>

        <h2>My Account</h2>
    </nav>


    <div id="myaccount">

        <!-- Left -->
        <aside>
            <p class="welcome">Welcome, ◯◯◯!</p>
            <hr>
            <nav>
                <ul>
                    <li><a href="orders.php">Orders →</a></li>
                    <li><a href="account-detail.php">Account Details →</a></li>
                    <li><a href="billing-detail.php">Billing Details →</a></li>
                    <li><a href="../login/index.php">Log out →</a></li>
                </ul>
            </nav>
        </aside>


        <!-- Right -->
        <main>

            <section id="account-detail">
                <h3>Billing Details</h3>

                <form action="#" id="billingForm" onsubmit="return validateBillingForm()" novalidate>
                    <!-- First Name -->
                    <fieldset>
                        <label for="firstName">First Name <span class="mandatory">*</span></label>
                        <input type="text" id="firstName" name="firstName" required placeholder="Enter your first name">
                        <span class="error-message" id="firstNameError">Please enter your first name.</span>
                    </fieldset>
                
                    <!-- Last Name -->
                    <fieldset>
                        <label for="lastName">Last Name <span class="mandatory">*</span></label>
                        <input type="text" id="lastName" name="lastName" required placeholder="Enter your last name">
                        <span class="error-message" id="lastNameError">Please enter your last name.</span>
                    </fieldset>
                
                    <!-- Company Name -->
                    <fieldset>
                        <label for="companyName">Company Name (optional)</label>
                        <input type="text" id="companyName" name="companyName" placeholder="Enter your company name (optional)">
                    </fieldset>
                
                    <!-- Phone -->
                    <fieldset>
                        <label for="phone">Phone <span class="mandatory">*</span></label>
                        <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number">
                        <span class="error-message" id="phoneError">Please enter a valid phone number.</span>
                    </fieldset>
                
                    <!-- Email -->
                    <fieldset>
                        <label for="email">Email <span class="mandatory">*</span></label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email address">
                        <span class="error-message" id="emailError">Please enter a valid email address.</span>
                    </fieldset>
                
                    <!-- Country/Region -->
                    <fieldset>
                        <label for="country">Country/Region <span class="mandatory">*</span></label>
                        <select id="country" name="country" required>
                            <option value="Australia">Australia</option>
                        </select>
                        <span class="error-message" id="countryError">Please select your country/region.</span>
                    </fieldset>
                
                    <!-- Street Address -->
                    <fieldset>
                        <label for="addressLine1">Street Address <span class="mandatory">*</span></label>
                        <input type="text" id="addressLine1" name="addressLine1" required placeholder="Enter your street address">
                        <input type="text" id="addressLine2" name="addressLine2" placeholder="Apartment, suite, etc. (optional)">
                        <span class="error-message" id="addressError">Please enter your street address.</span>
                    </fieldset>
                
                    <!-- Suburb -->
                    <fieldset>
                        <label for="suburb">Suburb <span class="mandatory">*</span></label>
                        <input type="text" id="suburb" name="suburb" required placeholder="Enter your suburb">
                        <span class="error-message" id="suburbError">Please enter your suburb.</span>
                    </fieldset>
                
                    <!-- State -->
                    <fieldset>
                        <label for="state">State <span class="mandatory">*</span></label>
                        <select id="state" name="state" required>
                            <option value="" disabled selected>Select your state</option>
                            <option value="NSW">New South Wales (NSW)</option>
                            <option value="VIC">Victoria (VIC)</option>
                            <option value="QLD">Queensland (QLD)</option>
                            <option value="WA">Western Australia (WA)</option>
                            <option value="SA">South Australia (SA)</option>
                            <option value="TAS">Tasmania (TAS)</option>
                            <option value="ACT">Australian Capital Territory (ACT)</option>
                            <option value="NT">Northern Territory (NT)</option>
                        </select>
                        <span class="error-message" id="stateError">Please select your state.</span>
                    </fieldset>
                
                    <!-- Post Code -->
                    <fieldset>
                        <label for="postcode">Post Code <span class="mandatory">*</span></label>
                        <input type="text" id="postcode" name="postcode" required placeholder="Enter your post code">
                        <span class="error-message" id="postcodeError">Please enter your post code.</span>
                    </fieldset>
                
                    <!-- Submit Button -->
                    <div class="submit_button">
                        <button type="submit">Update</button>
                    </div>
                </form>
                
            </section>
        
        </main>
    </div>

    <?php include '../footer.php'; ?>


</body>
</html>
