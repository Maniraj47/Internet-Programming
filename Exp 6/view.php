<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "cake_delight";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM orders ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Orders - Cake Delight</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom right, #fce4ec, #f8bbd0);
      margin: 0;
      color: #333;
    }
    header {
      background-color: #e91e63;
      color: #fff;
      padding: 20px 40px;
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
      max-width: 900px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    h2 {
      text-align: center;
      color: #e91e63;
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
      background-color: #e91e63;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>
  <header>
    <h1>Cake Delight</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="order.html">Order Cake</a>
      <a href="view_orders.php">View Orders</a>
    </nav>
  </header>
  <div class="container">
    <h2>All Orders</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Flavor</th>
        <th>Size</th>
        <th>Message</th>
        <th>Delivery Date</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['customer_name']) ?></td>
        <td><?= htmlspecialchars($row['flavor']) ?></td>
        <td><?= htmlspecialchars($row['size']) ?></td>
        <td><?= htmlspecialchars($row['message']) ?></td>
        <td><?= htmlspecialchars($row['delivery_date']) ?></td>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>

<?php
$conn->close();
?>
