<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['product_cat'];
    $prod_img = $_POST['img'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productDescription = $_POST['product_description'];


    $sql = "INSERT INTO products (CategoryID, image, Name,Description,Price) 
            VALUES ('$category', 'Images/$prod_img','$productName' ,'$productDescription','$productPrice')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Product added successfully";
    } else {
        $error_message = "Error adding product: " . $conn->error;
    }
}

        if (isset($success_message)) {
            echo "<p class='success-message'>$success_message</p>";
            header("Location: products.php");
        }

        if (isset($error_message)) {
            echo "<p class='error-message'>$error_message</p>";
        }
        ?>
