<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];

    // Check if email already exists
    $checkEmailSql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmailSql);

    if ($result->num_rows > 0) {
        echo "Error: Email has already been registered.";
    } else {
        // Proceed with registration
        $sql = "INSERT INTO users (email, name, surname, password, mobile, gender, city) VALUES ('$email', '$name', '$surname', '$password', '$mobile', '$gender', '$city')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="register.php">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="surname">Surname:</label><br>
        <input type="text" id="surname" name="surname" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <label for="mobile">Mobile:</label><br>
        <input type="number" id="mobile" name="mobile" required><br><br>
        <label for="gender">Gender:</label><br>
        <input type="text" id="gender" name="gender" required><br><br>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city" required><br><br>
        <button type="submit">Register</button>
    </form>
    <a href="login.php">Login</a>
</body>
</html>
