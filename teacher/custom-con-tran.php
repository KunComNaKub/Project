<?php
session_start();
require 'checkTeacher.php';
require '../connect.php';
$id = $_GET['GetID'];

$sql2 = "SELECT * FROM student_detail WHERE Student_id = $id";
$result = $connect->query($sql2);
$row2 = $result->fetch_assoc();

if(isset($_POST['submit'])){
    $name = $_POST['name1'];
}

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
                
                <form action = "../student/pdf_std_tran.php?GetID=<?php echo $row2['Student_id'] ?>&ACTION=VIEW" class = "" method ="POST">
                <table>
                    <h1>กำหนดการตรวจสอบเอกสารเทียบโอนผลการเรียนของนักศึกษา</h1>
                    <tr>
                        <td></td>
                    </tr>
                </table>
                <input type ="submit" value = "submit" name = "submit">
                </form>

                </div>
            </section>


    </body>
</html>
<!-- พงศกร ขำพิศ -->