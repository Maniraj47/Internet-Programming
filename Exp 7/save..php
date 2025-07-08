<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "beauty_parlor";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$service = $_POST['service'];
$date = $_POST['date'];
$time = $_POST['time'];
$notes = $_POST['notes'];

$sql = "INSERT INTO appointments (customer_name, service, date, time, notes) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $service, $date, $time, $notes);

if ($stmt->execute()) {
  echo "<h2 style='text-align:center;color:green;'>Appointment Booked Successfully!</h2>";
  echo "<p style='text-align:center;'><a href='view_appointments.php'>View Appointments</a></p>";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
