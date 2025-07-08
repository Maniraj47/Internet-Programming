<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "hospital_db";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$department = $_POST['department'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];
$time = $_POST['time'];
$symptoms = $_POST['symptoms'];

$sql = "INSERT INTO appointments (patient_name, department, doctor, date, time, symptoms) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $department, $doctor, $date, $time, $symptoms);

if ($stmt->execute()) {
  echo "<h2 style='text-align:center;color:green;'>Appointment Booked Successfully!</h2>";
  echo "<p style='text-align:center;'><a href='view_appointments.php'>View Appointments</a></p>";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
