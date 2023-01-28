<?php
session_start();
require 'checkStd.php';
require '../connect.php';
$id = $_SESSION['student_name_login'];
$sql = "SELECT * FROM student_detail, user WHERE student_detail.User_id = $id AND user.User_id = $id ";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
$student_id = $row['Student_id'];

if (isset($_POST['submit'])) {
 
    // Check if a file was uploaded
    if (isset($_FILES['pic_gra']) && $_FILES['pic_gra']['error'] === UPLOAD_ERR_OK) {
    $allows = array('png','jpg');
    $picture = $_FILES['pic_gra']['name'];
    $ext = pathinfo($picture, PATHINFO_EXTENSION);
    if(!in_array($ext,$allows)){
      echo ("<script LANGUAGE ='Javascript'>window.alert('กรุณาอัพโหลดไฟล์รูปภาพ png jpg');</script>");
    }
    else{
      $dir = "uploads/".$picture;
      $tem_loc =$_FILES['pic_gra']['tmp_name'];
      move_uploaded_file($tem_loc,$dir);
  
      $i_pic = "UPDATE student_detail SET Pic_grad = '$picture' WHERE Student_id = $student_id";
      $sql2 = mysqli_query($connect,$i_pic);
  
        // Redirect the user to a success page
        echo ("<script LANGUAGE='Javascript'>window.alert('อัพโหลดใบ รบ สำเร็จ');
        window.location.href='stdHome.php';</script>");
        exit;
    }
   
    }
   
    // If no file was uploaded, display an error message
    else {
      $error = 'Please select a file to upload.';
    }
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='stylestd.css'>   
    </head>
    <body>
    <header class="header">
        <a href="stdHome.php"><img src="../picture/มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก.png" class="logo"></a>
        </header>
        <div class="container">
            <nav class="sidebar">
                <div class="menu-bar">
                    <div class="menu">
                        <ul class="menu-links">
                            <li class="link">
                                <a href ="stdHome.php">
                                    <span class="text nav-text">หน้าหลัก</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="changepassword.php">
                                    <span class="text nav-text">เปลี่ยนรหัสผ่าน</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="logout.php">
                                    <span class="text nav-text">ออกจากระบบ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    <form action="Pic-gra.php" method="post" enctype="multipart/form-data">
      <div class = "box-add-pic">
      <h3>กรุณาอัพโหลดรูปภาพไฟล์ jpg หรือ png</h3>
      <h3>ตั่งชื่อไฟล์ ชื่อ-นามสกุล-รหัสนักศึกษา</h3>
      <table border= 5 width = "400">
        <tr>
          <td><label for="pic_gra">เลือกไฟล์อัพโหลด ใบ รบ:</label></td>
        </tr>
        <tr>
          <td>
            <input type="file" name="pic_gra" id="pic_gra" value = "เลือกไฟล์">
          </td>
        </tr>
      </table>
    <input type="submit" value="อัพโหลด" name="submit">
</div>
  </form>
    </body>
</html>
<!--พงศกร-->