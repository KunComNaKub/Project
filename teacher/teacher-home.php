<?php
session_start();
require 'checkTeacher.php';
require '../connect.php';
$Count_std = "SELECT COUNT(Student_id) as totalStd, COUNT(CASE WHEN std_confirm_tran = 1 THEN 1 END) as totalstdpen,COUNT(CASE WHEN std_confirm_tran = 0 THEN 1 END)as totalstdnot , COUNT(CASE WHEN std_confirm_tran = 2 THEN 1 END) as Totalpass, COUNT(CASE WHEN teacher_con = 1 THEN 1 END) as teacher_con_cus,COUNT(CASE WHEN teacher_con = 0 THEN 1 END) AS teache_not_cus FROM student_detail";
$result = $connect->query($Count_std);
$totalstd =$result->fetch_assoc();
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
                                <a href ="change_password.php">
                                    <span class="text nav-text">เปลี่ยนรหัส Password</span>
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
            <!--content-->
            <section class="home">
                <div class="container-box">
                    <div class ="display-box-showall-std">
                            <div class = "display-box">
                                <label>จำนวนนักเรียนทั้งหมด</label></br></br>
                                <label><?php echo $totalstd['totalStd'] ?></label>
                            </div>
                            <div class = "display-box">
                                <label>จำนวนนักเรียนที่อยู่ระหว่างดำเนินการ</label></br></br>
                                <label><?php echo $totalstd['totalstdpen'] ?></label>
                            </div>
                            <div class = "display-box">
                                <label>จำนวนนักเรียนที่ยังไม่ได้ดำเนินการเทียบโอนรายวิชา</label></br></br>
                                <label><?php echo $totalstd['totalstdnot'] ?></label>
                            </div>
                    </div>
                    <div class ="display-box-showall-std">
                            <div class = "display-box">
                                <label>จำนวนนักเรียนที่ยได้รับการอนุมัติแล้ว</label></br></br>
                                <label><?php echo $totalstd['Totalpass'] ?></label>
                            </div>
                            <div class = "display-box">
                                <label>จำนวนนักเรียนที่ได้รับการอนุมัติและได้ถูกกำหนดกรรมการพิจารณาเทียบโอนแล้ว</label></br></br>
                                <label><?php echo $totalstd['teacher_con_cus'] ?></label>
                            </div>
                            <div class = "display-box">
                                <label>จำนวนนักเรียนที่ได้รับการอนุมัติและยังไม่ได้กำหนดกรรมการพิจารณาเทียบโอน</label></br></br>
                                <label><?php echo $totalstd['teache_not_cus'] ?></label>
                            </div>
                    </div>
                </div>
            </section>
        </div>

</body>
</html>
<!--พงศกร ขำพิศ-->