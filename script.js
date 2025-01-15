document.addEventListener('DOMContentLoaded', () => {
    const shopMenu = document.querySelector('.dropdown > a');
    const submenu = document.querySelector('.submenu');
    const overlay = document.getElementById('overlay');
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const mainNav = document.getElementById('mainNav');

    // Function to check if the device is mobile
    const isMobile = () => window.innerWidth <= 768;

    // Toggle submenu visibility for desktop only
    shopMenu.addEventListener('click', (e) => {
        if (isMobile()) return; // Do nothing for mobile
        e.preventDefault();
        submenu.classList.toggle('active');
        overlay.classList.toggle('active');
    });

    // Toggle hamburger menu
    hamburgerBtn.addEventListener('click', () => {
        mainNav.classList.toggle('active');
        hamburgerBtn.classList.toggle('is-active');
        overlay.classList.toggle('active');
    });

    // Close the menu when overlay is clicked
    overlay.addEventListener('click', () => {
        mainNav.classList.remove('active');
        hamburgerBtn.classList.remove('is-active');
        overlay.classList.remove('active');
        submenu.classList.remove('active');
    });

    // Show submenu when hovering over Shop menu (desktop only)
    shopMenu.addEventListener('mouseover', () => {
        if (isMobile()) return; // Do nothing for mobile
        submenu.classList.add('active');
        overlay.classList.add('active');
    });

    // Hide submenu when mouse leaves the Shop menu (desktop only)
    submenu.addEventListener('mouseleave', () => {
        if (isMobile()) return; // Do nothing for mobile
        submenu.classList.remove('active');
        overlay.classList.remove('active');
    });

    // Optional: Adjust UI on window resize
    window.addEventListener('resize', () => {
        if (isMobile()) {
            submenu.classList.remove('active');
            overlay.classList.remove('active');
        }
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('header');
    const headerFix = document.getElementById('header_fix');

    // Check the scroll position and update the header class
    const onScroll = () => {
        if (window.scrollY > headerFix.offsetHeight) {
            header.classList.add('fixed');
        } else {
            header.classList.remove('fixed');
        }
    };

    // Add scroll event listener
    window.addEventListener('scroll', onScroll);
});

document.addEventListener("DOMContentLoaded", () => {
    const shopMenu = document.querySelector(".dropdown > a");
    const submenu = document.querySelector(".submenu");
    const overlay = document.getElementById("overlay");
    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const mainNav = document.getElementById("mainNav");
    const userIconContainer = document.getElementById("userIconContainer");
    const userMenu = document.getElementById("userMenu");

    // Fetch base URL from a hidden meta tag dynamically
    const baseURL = document.querySelector('meta[name="base-url"]').getAttribute("content");

    // Function to check if the device is mobile
    const isMobile = () => window.innerWidth <= 768;

    // Toggle submenu visibility for desktop only
    shopMenu?.addEventListener("click", (e) => {
        if (isMobile()) return;
        e.preventDefault();
        submenu.classList.toggle("active");
        overlay.classList.toggle("active");
    });

    // Toggle hamburger menu
    hamburgerBtn?.addEventListener("click", () => {
        mainNav.classList.toggle("active");
        hamburgerBtn.classList.toggle("is-active");
        overlay.classList.toggle("active");
    });

    // Close the menu when overlay is clicked
    overlay?.addEventListener("click", () => {
        mainNav.classList.remove("active");
        hamburgerBtn.classList.remove("is-active");
        overlay.classList.remove("active");
        submenu?.classList.remove("active");
        userMenu?.classList.add("hidden");
    });

    // Check login status
    if (userMenu) {
        const isLoggedIn = sessionStorage.getItem("isLoggedIn") === "true";
        const userName = sessionStorage.getItem("userName") || "Guest";

        // Populate the user menu dynamically
        if (isLoggedIn) {
            userMenu.innerHTML = `
                <ul>
                    <li><span style="font-weight: bold;">${userName}</span></li>
                    <li id="accountSettingsBtn"><a href="${baseURL}myaccount/account-detail.php">Account Settings</a></li>
                    <li id="logoutButton"><a href="#">Log Out</a></li>
                </ul>
            `;
        } else {
            userMenu.innerHTML = `
                <ul>
                    <li><a href="${baseURL}login/index.php">Login</a></li>
                    <li><a href="${baseURL}login/createaccount.php">Create Account</a></li>
                </ul>
            `;
        }

        // Add logout functionality
        document.getElementById("logoutButton")?.addEventListener("click", () => {
            sessionStorage.removeItem("isLoggedIn");
            sessionStorage.removeItem("userName");
            window.location.href = `${baseURL}login/index.php`;
        });

        // Toggle user menu visibility
        userIconContainer?.addEventListener("click", (e) => {
            e.stopPropagation();
            userMenu.classList.toggle("active");
        });

        // Close menu when clicking outside
        document.addEventListener("click", (event) => {
            if (!userIconContainer?.contains(event.target)) {
                userMenu.classList.remove("active");
            }
        });
    }
});


function updateUserIcon(name) {
    const userIconContainer = document.querySelector("#userIconContainer span");
    if (userIconContainer) {
        userIconContainer.textContent = name;
    }
}
