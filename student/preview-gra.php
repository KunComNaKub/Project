<?php
session_start();
require 'checkStd.php';
require '../connect.php';
$id = $_SESSION['student_name_login'];
$sql = "SELECT * FROM student_detail, user WHERE student_detail.User_id = $id AND user.User_id = $id ";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
$student_id = $row['Student_id'];
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
            <section class="home">
                <div class="container-box">
                    <img src = "uploads/<?php echo $row['Pic_grad'];?>" width = "1200" height = "1000"/>
                </div>
            </section>
    </body>
</html>
<!-- พงศกร -->