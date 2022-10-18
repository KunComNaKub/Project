<?php
session_start();
require 'checkStd.php';
require '../connect.php';
$id = $_SESSION['student_name_login'];
$sql = "SELECT * FROM student_detail, user WHERE student_detail.User_id = $id AND user.User_id = $id ";
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
        <link rel='stylesheet' type='text/css' media='screen' href='stylestd.css'>   
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
                                <a href ="stdHome.php">
                                    <span class="text nav-text">หน้าหลัก</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="#">
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
            <!--content-->
            <section class="home">
                <div class="container-box">
                    <div class= "head">
                        <h2>ข้อมูลนักศึกษา</h2>
                        <div class="box-detail-std">
                            <form action =" " class="detail-std" method="POST">
                                <table class="text-detail-std">
                                    <tbody>
                                        <tr>
                                            <td>รหัสนักศึกษา:</td>
                                            <td class="text-detail-std-td"><?php echo $row['Username'];?></td>
                                            <td>เลขประจำตัวประชาชน:</td>
                                            <td class="text-detail-std-td"><?php echo $row['Student_idcard' ];?></td>
                                            <td>ชือนักศึกษา:</td>
                                            <td class="text-detail-std-td"><?php echo $row['Fname'];?></td>
                                            <td>นาสกุล:</td>
                                            <td class="text-detail-std-td"><?php echo $row['Lname'];?></td>
                                        </tr>
                                        <tr>
                                            <td>คณะ:</td>
                                            <td class= "text-detail-std-td"><?php echo $row['Faculty'];?></td>
                                            <td>สาขา:</td>
                                            <td class = "text-detail-std-td"><?php echo $row['Major'];?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <div class="menu-student">
                                    <ul class="menu-student-link">
                                        <li class="link">
                                            <a href="edit_student.php?GetID=<?php echo $row['Student_id']; ?>">
                                                <span>แก้ไขข้อมูล</span>
                                            </a>
                                        </li>
                                        <li class="link">
                                            <a href="transfer_student.php?GetID=<?php echo $row['Student_id']; ?>">
                                                <span>เทียบโอน</span>
                                            </a>
                                        </li>
                                        <li class="link">
                                            <a href="#">
                                                <span>ประวัติเทียบโอน</span>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
<!--พงศกร-->