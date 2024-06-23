<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace these with your actual database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecommerce_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Secure way to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);

    $sql = "SELECT * FROM Customers WHERE Username = '$username' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION["username"] = $username;
        header("Location: dashboard.php"); // Redirect to dashboard or home page
    } else {
        // Login failed
        $login_error = "Invalid username or password.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - My E-Commerce Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>My E-Commerce Website</h1>
    </header>

    <section class="login-section">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <?php
        if (isset($login_error)) {
            echo "<p class='error-message'>$login_error</p>";
        }
        ?>

        <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
    </section>

    <footer>
        &copy; 2023 My E-Commerce Website
    </footer>

</body>
</html>
