<?php
// Start session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    require_once "connect.php";

    // Get username and password from form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare statement to select user from database
    $stmt = $con->prepare("SELECT id, username, password FROM user_auth WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    echo "sdc";
    // Check if user exists
    if ($result->num_rows == 1) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user["password"])) {
            // Password is correct, set session variables
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            
            // Redirect to dashboard or any other authenticated page
            header("Location: landing.html");
            exit();
        } else {
            // Password is incorrect
            $_SESSION["error"] = "Invalid username or password.";
            header("Location: index.html");
            exit();
        }
    } else {
        // User does not exist
        $_SESSION["error"] = "Invalid username or password.";
        header("Location: index.html");
        exit();
    }
} else {
    // Redirect to login page if accessed directly
    header("Location: login.html");
    exit();
}
?>
