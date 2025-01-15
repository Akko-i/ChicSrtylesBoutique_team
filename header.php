<?php
session_start();
include 'config.php';

if (isset($_SESSION['user_id'])) {
    include 'login/db_connection.php';

    try {
        $userId = $_SESSION['user_id'];
        $query = "SELECT user_first_name, user_last_name FROM USER WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            $_SESSION['user_first_name'] = $user['user_first_name'];
            $_SESSION['user_last_name'] = $user['user_last_name'];
        } else {
            error_log("User data not found in database.");
        }

        $stmt->close();
    } catch (Exception $e) {
        error_log("Error fetching user details: " . $e->getMessage());
    }
}
?>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const userIconName = document.getElementById("userIconName");
        if (userIconName) {
            console.log("Header loaded with user name:", userIconName.textContent);
        } else {
            console.error("Header userIconName span not found in DOM. Retrying...");
            setTimeout(() => {
                const retriedUserIconName = document.getElementById("userIconName");
                if (retriedUserIconName) {
                    console.log("User name found after retry:", retriedUserIconName.textContent);
                } else {
                    console.error("Retry failed. userIconName not found.");
                }
            }, 1000);
        }
    });
</script>

<head>
    <meta name="base-url" content="<?php echo BASE_URL; ?>">
</head>
<header id="header_fix">
    <div class="container">
        <!-- Hamburger menu -->
        <button class="hamburger" id="hamburgerBtn">
            <span></span>
            <span></span>
        </button>

        <!-- Navigation -->
        <nav id="mainNav">
            <ul class="main-menu">
                <li class="dropdown">
                    <a href="<?php echo BASE_URL; ?>shop/index.php">Shop</a>
                    <ul class="submenu" id="submenu">
                        <li><a href="<?php echo BASE_URL; ?>shop/newarrivals.php">New Arrivals →</a></li>
                        <li><a href="<?php echo BASE_URL; ?>shop/collection.php">Latest Collection →</a></li>
                        <li><a href="<?php echo BASE_URL; ?>shop/dresses.php">Dresses →</a></li>
                        <li><a href="<?php echo BASE_URL; ?>shop/accessories.php">Accessories →</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo BASE_URL; ?>lookbook/index.php">Look Book</a></li>
                <li><a href="<?php echo BASE_URL; ?>blogs/index.php">Blogs</a></li>
            </ul>
        </nav>

        <!-- Logo -->
        <h1>
            <a href="<?php echo BASE_URL; ?>index.php">
                <img src="<?php echo BASE_URL; ?>img/header/logo.png" alt="Chic Styles Boutique">
            </a>
        </h1>

        <!-- Icons -->
        <ul class="header-icons">
            <li id="userIconContainer">
                <img src="<?php echo BASE_URL; ?>img/header/icon-mypage.png" alt="User" id="userIcon">
                <div id="userMenu" class="user-menu">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <ul>
                            <li><span id="userIconName" style="font-weight: bold;">
                                <?php echo htmlspecialchars($_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name']); ?>
                            </span></li>
                            <li><a href="<?php echo BASE_URL; ?>myaccount/account-detail.php">Account Settings</a></li>
                            <li><a href="<?php echo BASE_URL; ?>logout.php">Log Out</a></li>
                        </ul>
                    <?php else: ?>
                        <ul>
                            <li><a href="<?php echo BASE_URL; ?>login/index.php">Login</a></li>
                            <li><a href="<?php echo BASE_URL; ?>login/createaccount.php">Create Account</a></li>
                        </ul>
                    <?php endif; ?>
                </div>
            </li>
            <li><a href="#"><img src="<?php echo BASE_URL; ?>img/header/icon-cart.png" alt="Cart"></a></li>
        </ul>
    </div>
</header>
