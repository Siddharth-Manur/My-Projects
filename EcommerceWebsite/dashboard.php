<?php
session_start();


if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - My E-Commerce Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>My E-Commerce Website</h1>
    </header>

    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="products.php">Products</a>
        <a href="orders.php">Orders</a>
        
        <a href="logout.php">Logout</a>
    </nav>

    <section class="dashboard-section">
        <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
        <p>This is your dashboard.</p>
    </section>

    <footer>
        &copy; 2023 My E-Commerce Website
    </footer>

</body>
</html>
