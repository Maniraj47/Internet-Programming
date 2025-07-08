<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "skyreserve";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM bookings ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Your Bookings - SkyReserve</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom right, #f8bbd0, #e1bee7);
      margin: 0;
      color: #333;
    }
    header {
      background: rgba(255, 192, 203, 0.8);
      padding: 20px 40px;
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h1 {
      font-size: 28px;
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
      max-width: 800px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
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
      background-color: #f06292;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>
  <header>
    <h1>SkyReserve</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="book_flight.html">Book Flight</a>
      <a href="view_bookings.php">Your Bookings</a>
      <a href="#">Contact</a>
    </nav>
  </header>
  <div class="container">
    <h2>Your Bookings</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Passenger</th>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['passenger']) ?></td>
        <td><?= htmlspecialchars($row['origin']) ?></td>
        <td><?= htmlspecialchars($row['destination']) ?></td>
        <td><?= htmlspecialchars($row['travel_date']) ?></td>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>

<?php
$conn->close();
?>
