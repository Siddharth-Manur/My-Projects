<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_database";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];

$sql = "SELECT * FROM ORDERS o,CUSTOMERS c where c.Username = '$username' and o.CustomerID=c.CustomerID";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your E-Commerce Website - Orders</title>
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

    <?php echo "<h1>".$_SESSION["username"]."! These are you order details</h1>"; ?>
    <section class="orders-section">
        <h2>Order History</h2>

        <?php
        if ($result->num_rows > 0) {
            while ($order = $result->fetch_assoc()) {
               
                ?>
                
                <div class='order'>
                    <h3>Order ID: <?php echo $order["OrderID"]; ?></h3>
                    <h3>Customer ID: <?php echo $order["CustomerID"]; ?></h3>
                    <p>Date: <?php echo $order["OrderDate"]; ?></p>
                    <p>Total Amount: $<?php echo $order["TotalAmount"]; ?></p>



                    
                    <a href="view_order.php?order_id=<?php echo $order["OrderID"]; ?>">View Details</a>
                </div>
                <?php
                
            }
        } else {
            echo "<p>No orders available.</p>";
        }

        
        $conn->close();
        ?>
    </section>

    <footer>
        &copy; 2023 Your E-Commerce Website
    </footer>

</body>
</html>
