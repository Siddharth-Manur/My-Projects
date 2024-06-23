<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your E-Commerce Website - Payment</title>
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

    <section class="payment-section">
        <h2>Payment Details</h2>

        
        <form action="process_payment.php" method="post">
            

            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" name="cardNumber" required>

            <label for="expiryDate">Expiry Date:</label>
            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required>

            <label for="cardHolderName">Cardholder Name:</label>
            <input type="text" id="cardHolderName" name="cardHolderName" required>

            <button type="submit">Submit Payment</button>
        </form>
    </section>

    <footer>
        &copy; 2023 Your E-Commerce Website
    </footer>

</body>
</html>
