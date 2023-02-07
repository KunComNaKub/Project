<?php
session_start();
require 'checkStd.php';
require '../connect.php';
$Subject_id = $_GET['GetID'];
$sql = "SELECT * FROM subject WHERE subject.Subject_id = $Subject_id ";
$result = $connect->query($sql);
$row = $result->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='stylestd.css'>
    <title>Document</title>
</head>
<body>
<header class="header">
            <a href="stdHome.php"><img src="../picture/มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก.png" class="logo"></a>
        </header>
        <div class ="container_transfer">
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
                <div class="container-box1">
                <button onclick="history.go(-1);"> ย้อนกลับ </button>
                    <h1>วิชา <?php echo $row['Name_sub']; echo '&nbsp&nbsp';echo $row ['Group_Category'];echo '&nbsp&nbsp';echo $row['Group_sub'];echo '&nbsp&nbsp';echo "สาขา"; echo $row['Faculty'];echo '&nbsp&nbsp';echo "หลักสูตร";echo $row['subject_scheme']; ?> </h1>
                    <h3>คำอธิบายรายวิชา</h3>
                    <p><?php echo $row ['Sub_descrip'] ?></p>
                </div>
            </section>
</body>
    </html>
<!-- พงศกร ขำพิศ -->