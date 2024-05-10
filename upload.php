<?php
require 'php/connection.php';
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'img/' . $newImageName);
      $query = "INSERT INTO tb_upload VALUES('', '$name', '$newImageName')";
      mysqli_query($conn, $query);
      echo
      "
      <script>
        alert('Successfully Added');
        document.location.href = 'php/home.php#course';
      </script>
      ";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.css">
    <title>Upload Image File</title>
  </head>
  <body>
<header>
        <div class="container">
            <div class="header-logo">
                <a href="php/home.php"><img src="img/logo.jpg" alt="logo"></a>
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
                    <li><a href="#course">الكورسات</a></li>
                    <li><a href="#schoolCou">المقررات الدراسية</a></li>
                </ul>
            </div>
            
            <!-- <button onclick="btnclick();" id="btn-menu"><i class="fa fa-bars" aria-hidden="true"></i></button> -->
        </div>
  </header>



    <div class="container">
        <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="name">اسم الكورس : </label>
        <input type="text" name="name" id = "name" required value=""> <br>
        <label for="image">صورة الكورس : </label>
        <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
        <button type = "submit" name = "submit">Submit</button>
      </form>
      <br>
      <a href="php/home.php#course">عرض الكورسات</a>
    </div>
  </body>
</html>