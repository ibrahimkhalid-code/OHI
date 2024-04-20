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
<header>
        <div class="container">
            <div class="header-logo">
                <a href="index.html"><img src="img/logo.jpg" alt="logo"></a>
            </div>
            
            <div class="Login">
                <a href="index.php" class="login-btn">تسجيل الدخول</a>
            </div>

            <div class="header-list">
                <ul class="header-list-center">
                    
                    <li class="list"><a href="#"><i class="fa fa-chevron-down" aria-hidden="true"></i>الشعب</a>
                        <ul class="InerList">
                            <a href="mis.html"><li>نظم المعلومات الادارية</li></a>
                            <a href="accounting.html"><li>محاسبة</li></a>
                            <a href="management.html"><li>ادارة الاعمال</li></a>
                        </ul>
                    </li>
                    <li><a href="#staff">اعضاء هيئة التدريس</a></li>
                    <li><a href="#politics">الكورسات</a></li>
                    <li><a href="#callUs">المقررات الدراسية</a></li>
                    <li><a href="#staff">اعضاء هيئة التدريس</a></li>
                    <li><a href="#callUs">اتصل بنا</a></li>
                </ul>
            </div>
            
            <!-- <button onclick="btnclick();" id="btn-menu"><i class="fa fa-bars" aria-hidden="true"></i></button> -->
        </div>
    </header>

    <form method="POST">
        <div class="container">
            <label for="">Username</label>
            <input type="text" name="user" id="">

            <label for="">password</label>
            <input type="password" name="pass" id="">
            <button id="btnForm" type="submit" name="btnlogin">Login</button>
        </div>
    </form>



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST["user"];
        $pass = $_POST["pass"];

        $host = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "ohi";

        $conn = new mysqli($host, $dbuser, $dbpass, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT * FROM login WHERE user = '$user' AND pass = '$pass'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            // User is authenticated, perform actions or redirect to a secure page
            header("Location: exam.html");
            exit();
        } else {
            // Invalid credentials, display an error message or redirect to a login page
            echo("Error");
            exit();
        }

        $conn->close();
    }
?>
</body>
</html>