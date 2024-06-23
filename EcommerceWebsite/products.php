<?php
session_start();


if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}


 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecommerce_database";



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM Products";
$result = $conn->query($sql);


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your E-Commerce Website</title>
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
        
        <a href="logout.php">Logout</a>
    </nav>

    <section class="products-section">
        <h2>Products</h2>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                
                ?>
                <div class='product'>
                    
                    <img src="<?php echo $row["image"]; ?>" alt="<?php echo $row["Name"]; ?>" class="product-image">
                    
                    <h3><?php echo $row["Name"]; ?></h3>
                    <p>Description: <?php echo $row["Description"]; ?></p>
                    <p>Price: $<?php echo $row["Price"]; ?></p>
                    
                    
                    <button onclick='buyNow(<?php echo $row["ProductID"]; ?>, "<?php echo $row["Name"]; ?>", <?php echo $row["Price"]; ?>)'>Buy Now</button>
                </div>
                <?php
                
            }
        } else {
            echo "<p>No products available.</p>";
        }
        ?>
    </section>

    <footer>
        &copy; 2023 Your E-Commerce Website
    </footer>

  
    <style>
        .product-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>

    
    <script>
        function buyNow(productId, productName, productPrice) {
            
            alert("Buy now: " + productName + " - $" + productPrice);
            window.location.href = "payment.php";
        }
    </script>

</body>
</html>
