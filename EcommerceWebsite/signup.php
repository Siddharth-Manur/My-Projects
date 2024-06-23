<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecommerce_database";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $firstName = mysqli_real_escape_string($conn, $firstName);
    $lastName = mysqli_real_escape_string($conn, $lastName);
    $email = mysqli_real_escape_string($conn, $email);
    $username = mysqli_real_escape_string($conn, $username);

    $sql = "INSERT INTO Customers (FirstName, LastName, Email, Username, Password) VALUES ('$firstName', '$lastName', '$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
       
        header("Location: login.php"); 
        exit();
    } else {
        
        $signup_error = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - My E-Commerce Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>My E-Commerce Website</h1>
    </header>

    <nav>
        
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>
    </nav>

    <section class="signup-section">
        <h2>Sign Up</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Sign Up</button>
        </form>

        <?php
        if (isset($signup_error)) {
            echo "<p class='error-message'>$signup_error</p>";
        }
        ?>

        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </section>

    <footer>
        &copy; 2023 My E-Commerce Website
    </footer>

</body>
</html>
