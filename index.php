<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome, <?php echo $user['name'] . ' ' . $user['surname']; ?>!</h1>
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Mobile: <?php echo $user['mobile']; ?></p>
    <p>Gender: <?php echo $user['gender']; ?></p>
    <p>City: <?php echo $user['city']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
