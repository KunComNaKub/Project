<?php
session_start();
require 'checkAdmin.php';
require '../connect.php';
$Count_std = "SELECT COUNT(Student_id) as totalStd, COUNT(CASE WHEN std_confirm_tran = 1 THEN 1 END) as totalstdpen,COUNT(CASE WHEN std_confirm_tran = 0 THEN 1 END)as totalstdnot , COUNT(CASE WHEN std_confirm_tran = 2 THEN 1 END) as Totalpass, COUNT(CASE WHEN teacher_con = 1 THEN 1 END) as teacher_con_cus,COUNT(CASE WHEN teacher_con = 0 THEN 1 END) AS teache_not_cus FROM student_detail";
$result = $connect->query($Count_std);
$totalstd =$result->fetch_assoc();

$Count_teacher = "SELECT COUNT(Teacher_id) as Allteacher FROM teacher";
$result2 = $connect->query($Count_teacher);
$totalteacher = $result2->fetch_assoc();

$Count_addmin = "SELECT COUNT(Admin_id) as Alladmin FROM admin_list";
$result3 = $connect->query($Count_addmin);
$totaladmin = $result3->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='styleadmin.css'>   
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
                                <a href ="admin_home.php">
                                    <span class="text nav-text">หน้าหลัก ADMIN</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="admin_manageStd.php">
                                    <span class="text nav-text">จัดการรายชื่อนักศึกษา</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="add-user-teacher.php">
                                    <span class="text nav-text">เพิ่มผู้ใช้งานอาจารย์</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="Admin_manageSub.php">
                                    <span class="text nav-text">จัดการวิชา</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="add-admin.php">
                                    <span class="text nav-text">เพิ่ม Admin</span>
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
                    <div class = "display-box-showall-std">
                            <div class = "display-box">
                                <label>จำนวน User admin ทั้งหมด</label></br></br>
                                <label><?php echo $totaladmin ['Alladmin'] ?></label>
                            </div>
                    </div>
                    <div class = "line"></div>
                    <div class = "display-box-showall-std">
                            <div class = "display-box">
                                <label>จำนวน User Teacher ทั้งหมด</label></br></br>
                                <label><?php echo $totalteacher ['Allteacher'] ?></label>
                            </div>
                    </div>
                    <div class = "line"></div>
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
                    <div class = "line"></div>
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