<?php
session_start();
require 'checkTeacher.php';
require '../connect.php';
$id = $_GET['GetID'];

$sql2 = "SELECT * FROM student_detail WHERE Student_id = $id";
$result = $connect->query($sql2);
$row2 = $result->fetch_assoc();


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
                <div class= "container-box">
                    <a href = "estimate-std.php?GetID=<?php echo $id ?>" class = "">ย้อนกลับไปหน้าพิจารณา</a>
                
                <form action = "add-con-tran.php?GetID=<?php echo $id ?>" class = "" method ="POST">
                <table>
                    <h1>กำหนดชื่อผู้พิจารณา กำหนดการตรวจสอบเอกสารเทียบโอนผลการเรียนของนักศึกษา</h1>
                    <tr>
                        <td>อาจารย์ที่ปรึกษา</td>
                        <td>หัวหน้าสาขา</td>
                    </tr>
                    <tr>
                        <td><input type = "text" name = "name_adivisor" placeholder= "นาย ชื่อ นามสกุล" required></td>
                        <td><input type = "text" name = "name_chief" placeholder= "นาย ชื่อ นามสกุล" required></td>
                    </tr>
                    <tr>
                        <td>ประธานกรรมการ</td>
                        <td>กรรมการ คนที่1</td>
                        <td>กรรมการ คนที่2</td>
                    </tr>
                    <tr>
                        <td><input type = "text" name = "name_president" placeholder= "นาย ชื่อ นามสกุล" required></td>
                        <td><input type = "text" name = "name_1" placeholder= "นาย ชื่อ นามสกุล" required></td>
                        <td><input type = "text" name = "name_2" placeholder= "นาย ชื่อ นามสกุล" required></td>
                    </tr>
                    <tr>
                        <td>กรรมการ คนที่3</td>
                        <td>กรรมการ คนที่4</td>
                        <td>กรรมการ คนที่5</td>
                    </tr>
                    <tr>
                        <td><input type = "text" name = "name_3" placeholder= "นาย ชื่อ นามสกุล"></td>
                        <td><input type = "text" name = "name_4" placeholder= "นาย ชื่อ นามสกุล"></td>
                        <td><input type = "text" name = "name_5" placeholder= "นาย ชื่อ นามสกุล"></td>
                    </tr>
                </table>
                <input type ="submit" value = "submit" name = "submit">
                </form>

                </div>
            </section>


    </body>
</html>
<!-- พงศกร ขำพิศ -->