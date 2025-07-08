<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // or "root" if you set that
$dbname = "railway";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query
$sql = "SELECT * FROM bookings ORDER BY date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Bookings - SwiftRail</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
    }
    header {
      background-color: #263238;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 28px;
      font-weight: bold;
    }
    nav {
      background-color: #37474f;
      padding: 10px;
      text-align: center;
    }
    nav a {
      color: white;
      margin: 0 15px;
      text-decoration: none;
      font-weight: bold;
    }
    nav a:hover {
      text-decoration: underline;
    }
    .container {
      max-width: 800px;
      margin: 30px auto;
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
    }
    th {
      background-color: #607d8b;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    h2 {
      text-align: center;
      color: #333;
    }
  </style>
</head>
<body>

<header>SwiftRail</header>
<nav>
  <a href="index.html">Home</a>
  <a href="book_ticket.html">Book Ticket</a>
  <a href="view_bookings.php">View Bookings</a>
</nav>

<div class="container">
  <h2>All Bookings</h2>

  <?php if ($result && $result->num_rows > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
        <th>Seat No.</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo htmlspecialchars($row["id"]); ?></td>
          <td><?php echo htmlspecialchars($row["name"]); ?></td>
          <td><?php echo htmlspecialchars($row["from_station"]); ?></td>
          <td><?php echo htmlspecialchars($row["to_station"]); ?></td>
          <td><?php echo htmlspecialchars($row["date"]); ?></td>
          <td><?php echo htmlspecialchars($row["seat_number"]); ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p style="text-align: center;">No bookings found.</p>
  <?php endif; ?>

  <?php $conn->close(); ?>
</div>

</body>
</html>
