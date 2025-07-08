<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "hospital_db";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM appointments ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Appointments - HealthCare Plus</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom right, #e0f7fa, #80deea);
      margin: 0;
      color: #333;
    }
    header {
      background-color: #00796b;
      color: #fff;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h1 {
      margin: 0;
    }
    nav a {
      margin-left: 20px;
      color: #fff;
      text-decoration: none;
      font-weight: bold;
    }
    nav a:hover {
      text-decoration: underline;
    }
    .container {
      max-width: 900px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    h2 {
      text-align: center;
      color: #00796b;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }
    th {
      background-color: #00796b;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>
  <header>
    <h1>HealthCare Plus</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="book.html">Book Appointment</a>
      <a href="view_appointments.php">View Appointments</a>
    </nav>
  </header>
  <div class="container">
    <h2>All Appointments</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Patient</th>
        <th>Department</th>
        <th>Doctor</th>
        <th>Date</th>
        <th>Time</th>
        <th>Symptoms</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['patient_name']) ?></td>
        <td><?= htmlspecialchars($row['department']) ?></td>
        <td><?= htmlspecialchars($row['doctor']) ?></td>
        <td><?= htmlspecialchars($row['date']) ?></td>
        <td><?= htmlspecialchars($row['time']) ?></td>
        <td><?= htmlspecialchars($row['symptoms']) ?></td>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>

<?php
$conn->close();
?>
