<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "cake_delight";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$flavor = $_POST['flavor'];
$size = $_POST['size'];
$message = $_POST['message'];
$date = $_POST['date'];

$sql = "INSERT INTO orders (customer_name, flavor, size, message, delivery_date) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $flavor, $size, $message, $date);

if ($stmt->execute()) {
  echo "<h2 style='text-align:center;color:green;'>Order Placed Successfully!</h2>";
  echo "<p style='text-align:center;'><a href='view_orders.php'>View All Orders</a></p>";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
