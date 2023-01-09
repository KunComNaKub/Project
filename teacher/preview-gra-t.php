<?php
session_start();
require '../connect.php';
require 'checkTeacher.php';
$id = $_GET['GetID'];
$sql = "SELECT * FROM student_detail WHERE Student_id = $id";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='styleteacher.css'>   
    </head>
    <body>
<!--web forms-->
<header class="header">
        <img src="../picture/มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก.png" class="logo">
        </header>
        <div class="container">
            <nav class="sidebar">
                <div class="menu-bar">
                    <div class="menu">
                        <ul class="menu-links">
                            <li class="link">
                                <a href ="teacher-home.php">
                                    <span class="text nav-text">หน้าหลัก TEACHER</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="T-estimate-std.php">
                                    <span class="text nav-text">ประเมินพิจารณา นศ.</span>
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
                    <div>
                    <a href = "estimate-std.php?GetID=<?php echo $id ?>" class = "">ย้อนกลับไปหน้าพิจารณา
                    <?php  if($row['Pic_grad'] == ""){
                        echo "<br>";
                        echo "ยังไม่มีรูป";
                        }?>
                    </div>
                    <img src = "../student/uploads/<?php echo $row['Pic_grad'];?>" width = "1100" height = "800"/>
                </div>
            </section>

</body>
</html>
<!-- พงศกร ขำพิศ -->
