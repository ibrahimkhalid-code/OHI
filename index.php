<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/all.css">
</head>
<body>

    <form method="POST" action="index.php">
        <div class="container">
            <label for="">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="">password</label>
            <input type="password" id="password" name="password" required>
            <input id="btnForm" type="submit" value="تسجيل الدخول">
        </div>
    </form>



    <?php
session_start();

require_once "php/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {

        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $username;

        header('Location: php/dashboard.php');
        exit();
    } else {
        echo 'بيانات تسجيل الدخول غير صحيحة!';
    }
}

$conn->close();
?>



</body>
</html>