<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "skyreserve";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$passenger = $_POST['passenger'];
$from = $_POST['from'];
$to = $_POST['to'];
$date = $_POST['date'];

$sql = "INSERT INTO bookings (passenger, origin, destination, travel_date) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $passenger, $from, $to, $date);

if ($stmt->execute()) {
  echo "<h2 style='text-align:center;color:green;'>Booking Confirmed!</h2>";
  echo "<p style='text-align:center;'><a href='view_bookings.php'>View All Bookings</a></p>";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
