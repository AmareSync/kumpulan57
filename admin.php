<?php
// admin.php

// Connect to database
$conn = new mysqli("localhost", "root", "", "amaresync");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get mood counts
$sql = "SELECT mood, COUNT(*) as count FROM mood_data GROUP BY mood";
$result = $conn->query($sql);

$moods = [];
while ($row = $result->fetch_assoc()) {
  $moods[$row["mood"]] = $row["count"];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>AmareSync Admin Panel</title>
  <link rel="stylesheet" href="admin.css" />
</head>
<body>
  <header class="scalloped">
    <div class="container">
      <h1 class="logo">Admin Panel</h1>
      <a href="index.html" class="btn-pink">← Back to AmareSync</a>
    </div>
  </header>

  <section class="container">
    <h2>Mood Submissions 💬</h2>
    <table>
      <tr>
        <th>Mood</th>
        <th>Count</th>
      </tr>
      <?php foreach ($moods as $mood => $count): ?>
      <tr>
        <td><?php echo htmlspecialchars($mood); ?></td>
        <td><?php echo $count; ?></td>
      </tr>
      <?php
include 'db.php';
$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Registered Users</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background: #f4f4f4; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Registered Users</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Birth Date</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['birthdate'] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php $conn->close(); ?>
      <?php endforeach; ?>
    </table>
  </section>

  <footer class="footer">
    &copy; 2025 AmareSync Admin | Secure & Sweet 🍓
  </footer>
</body>
</html>