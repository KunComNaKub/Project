<?php
session_start();
require 'checkTeacher.php';
require '../connect.php';

$Student_id = $_GET['GetID'];
$sql = "SELECT * FROM transfer_std INNER JOIN subject ON transfer_std.Subjecttrans_id = subject.Subject_id WHERE transfer_std.Student_id = $Student_id ";


$sql2 = "SELECT * FROM student_detail WHERE Student_id = $Student_id";
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
                <div class= "container-box">
                    <form action = "test.php?GetID=<?php echo $Student_id ?>" class = "estimate-std" method = "POST">
                        <div>
                            <h3>วิชาที่<?php echo $row2['Prefix']; echo "&nbsp&nbsp" ; echo $row2['Fname'] ;echo "&nbsp&nbsp" ; echo $row2['Lname'];?> เลือกเทียบโอน</h3>
                        </div>
                        <div>
                       
                        </div>
                        <?php
                        $result = $connect->query($sql);
                        if($result){ ?>
                        <table>
                            <tr>
                                <td>กลุ่ม</td>
                                <td>กลุ่มวิชา</td>
                                <td>หมวดวิชา</td>
                                <td>รหัสวิชา</td>
                                <td>รายวิชาปริญาตรี มทร.ตะวันออก</td>
                                <td>หน่วยกิต</td>
                                <td>รหัสวิชา</td>
                                <td>รายวิชาประกาศนียบัตรวิชาชีพชั้นสูง</td>
                                <td>หน่วยกิต</td>
                                <td>เกรด</td>
                                <td>พิจารณา</td>
                            </tr>
                            <?php
                                while ($row = $result ->fetch_assoc()):
                            ?>
                            <tr>
                                <?php $id = $row['id'];?>
                                <td><?php echo $row['Group_Category']; ?></td>
                                <td><?php echo $row['Group_sub']; ?></td>  
                                <td><?php echo $row['Group_course']; ?></td>
                                <td><?php echo $row['Course_code']; ?></td>
                                <td><?php echo $row['Name_sub']; ?></td>
                                <td><?php echo $row['Credit']; ?></td>
                                <td><?php echo $row['Subject_idtran']; ?></td>
                                <td><?php echo $row['Subject_nametran']; ?></td> 
                                <td><?php echo $row['Credit_tran']; ?></td>
                                <td><?php echo $row['Gpa_tran']; ?></td>
                                <td><select name="estimate[<?php echo $id ?>]">
                                    <option value = <?php echo $row ['Teacher_pass'] ?>><?php echo $row ['Teacher_pass'] ?></option>
                                    <option value = "ผ่าน">ผ่าน</option>
                                    <option value = "ไม่ผ่าน">ไม่ผ่าน</option>
                                </select></td>
                            </tr>
                            <?php endwhile ?>
                        </table>
                        <div>
                        <input type = "submit" name = "confirm-tran" value = "ยืนยัน">
                        </div>
                        <a href ="preview-gra-t.php?GetID=<?php echo $row2['Student_id'];?>" class = "preview-pic">ดูใบ รบ</a>
                        <a href ="../student/pdf_std_tran.php?GetID=<?php echo $row2['Student_id'] ?>&ACTION=VIEW" class = "preview-std">Preview</a>
                        <a href ="custom-con-tran.php?GetID=<?php echo $row2['Student_id'] ?>">กำหนดใบอนุมัติ</a>  

            <div>
                    </form>
                   
                </div>
                <?php
                    } else{
                        echo "ERROR: " . $connect->error;
                    }
                    ?>
    </body>
</html>
<!-- พงศกร ขำพิศ -->