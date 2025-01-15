<?php
require '../login/db_connection.php'; // Adjust path as needed
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    // Validate if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'You must be logged in to change your password.']);
        exit;
    }

    $userId = $_SESSION['user_id'];
    $currentPassword = trim($_POST['currentPassword']);
    $newPassword = trim($_POST['newPassword']);

    // Validate current password
    $query = "SELECT user_password FROM USER WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the current password
        if (!password_verify($currentPassword, $row['user_password'])) {
            echo json_encode(['success' => false, 'message' => 'Current password is incorrect.']);
            exit;
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found.']);
        exit;
    }

    // Validate new password complexity (server-side check)
    $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\-_=+,.<>?:;#^])[A-Za-z\d@$!%*?&\-_=+,.<>?:;#^]{8,}$/';
    if (!preg_match($passwordRegex, $newPassword)) {
        echo json_encode(['success' => false, 'message' => 'New password does not meet complexity requirements.']);
        exit;
    }

    // Hash the new password and update it in the database
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $updateQuery = "UPDATE USER SET user_password = ? WHERE user_id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('si', $hashedPassword, $userId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Password updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update the password.']);
    }
    exit;
}
?>
