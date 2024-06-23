<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_database";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['product_name'];

    $sql = "DELETE FROM products WHERE Name = '$productName'";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Product deleted successfully";
    } else {
        $error_message = "Error deleting product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin access</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>

    <header>
        <h1>Your E-Commerce Website</h1>
    </header>

    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="products.php">Products</a>
        <a href="orders.php">Orders</a>
        
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>
    </nav>

    

    <section class="add-product-section">
        <h2>Add New Product</h2>

        <form action="addproduct.php" method="post">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required>


            <label for="product_cat">Category:</label>
            <select name="product_cat" id="category">
                <option value="1">Electronics</option>
                <option value="2">Clothings</option>
                <option value="3">Books</option>
            </select>

            <label for="product_price">Product Price:</label>
            <input type="number" id="product_price" name="product_price" step="0.01" required>


            <label for="product_img">image</label>
            <input type="file" name="img">

            <label for="product_description">Product Description:</label>
            <textarea id="product_description" name="product_description" rows="4" required></textarea>

            <button type="submit">Add Product</button>
        </form>

        
    </section>
    <section class="delete-product-section">
        <h2>Delete Product</h2>

        <form action="admin.php" method="post">
            <label for="product_name">Product Name:</label>
            <input type="text"  name="product_name" required>

            <button type="submit">Delete Product</button>
        </form>
        <?php
        if (isset($success_message)) {
            echo "<p class='success-message'>$success_message</p>";
            header("Location: products.php");
        }

        if (isset($error_message)) {
            echo "<p class='error-message'>$error_message</p>";
        }
        ?>

    </section>
    <footer>
        &copy; 2023 Your E-Commerce Website
    </footer>

</body>
</html>
