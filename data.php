<?php
// Database connection
$servername = "localhost";
$username = "root"; // change if needed
$password = ""; // change if needed
$dbname = "amaresync"; // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$birthdate = $_POST['birthdate'];

// Insert into database
$sql = "INSERT INTO users (name, phone, address, birthdate)
        VALUES ('$name', '$phone', '$address', '$birthdate')";

if ($conn->query($sql) === TRUE) {
  // Redirect back to home page after successful signup
  header("Location: index.html");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];

    $sql = "INSERT INTO users (name, phone, address, birthdate) 
            VALUES ('$name', '$phone', '$address', '$birthdate')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful! <a href='index.html'>Go back</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

