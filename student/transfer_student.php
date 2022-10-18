<?php
session_start();
require 'checkStd.php';
require '../connect.php';
$id = $_SESSION['student_name_login'];
$sql = "SELECT * FROM student_detail, user WHERE student_detail.User_id = $id AND user.User_id = $id ";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
$Student_id = $row['Student_id'];
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
            <img src="../picture/มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก.png" class="logo">
        </header>
        <div class ="container_transfer">
            <form action ="add_transfer.php?ID=<?php echo $Student_id ;?>"class = "box_transfer" method="POST">
                <div class="box_transfer_social">
                    <h1>กลุ่มวิชาสังคม</h1>
                    <div class="box_transfer_subject_1">
                        <span>รายวิชาบังคับ</span>
                        <table>
                            <tr>
                                <td>หมวดวิชา</td>
                                <td>รหัสวิชา</td>
                                <td>รายวิชาปริญาตรี มทร.ตะวันออก</td>
                                <td>หน่วยกิต</td>
                                <td>รหัสวิชา</td>
                                <td>รายวิชาประกาศนียบัตรวิชาชีพชั้นสูง</td>
                                <td>หน่วยกิต</td>
                                <td>เกรด</td>
                                <td>เทียบโอน</td>
                                <td>ลบ</td>
                            </tr>
                            <?php 
                            $sql = "SELECT * FROM subject left JOIN (SELECT * FROM transfer_std WHERE Student_id = $Student_id ) as transfer_std on subject.Subject_id = transfer_std.Subjecttrans_id WHERE Group_Category = 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์' AND Group_sub = 'รายวิชาบังคับ' "; 
                            $result = $connect->query($sql);
                            while ($row = $result ->fetch_assoc()):
                             ?>
                            <tr>
                                <td><?php echo $row['Group_course']; ?></td>
                                <td><?php echo $row['Course_code'];?></td>
                                <td><?php echo $row['Name_sub'];?></td>
                                <td><?php echo $row['Credit'];?></td>
                                <td><?php echo $row['Subject_idtran'];?></td>
                                <td><?php echo $row['Subject_nametran'];?></td>
                                <td><?php echo $row['Credit_tran'];?></td>
                                <td><?php echo $row['Gpa_tran'];?></td>
                                <td><a href ="add_transfer.php?GetID=<?php echo $row['Subject_id'] ?>">เทียบโอน</td>
                                <td></td>
                                
                                <?php endwhile ?>
                            </tr>
                        </table>

                        <span>รายวิชาสังคมศาสตร์</span>    
                        <table>
                        <tr>
                            <td>หมวดวิชา</td>
                            <td>รหัสวิชา</td>
                            <td>รายวิชาปริญาตรี มทร.ตะวันออก</td>
                            <td>หน่วยกิต</td>
                            <td>รหัสวิชา</td>
                            <td>รายวิชาประกาศนียบัตรวิชาชีพชั้นสูง</td>
                            <td>หน่วยกิต</td>
                            <td>เกรด</td>
                            <td>เทียบโอน</td>
                            <td>ลบ</td>
                            </tr>
                            <?php 
                            $sql = "SELECT * FROM subject WHERE Group_Category = 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์' AND Group_sub = 'รายวิชาสังคมศาสตร์' "; 
                            $result = $connect->query($sql);
                            while ($row = $result ->fetch_assoc()):
                             ?>
                            <tr>
                            <td><?php echo $row['Group_course']; ?></td>
                            <td><?php echo $row['Course_code'];?></td>
                            <td><?php echo $row['Name_sub'];?></td>
                            <td><?php echo $row['Credit'];?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>
                            <?php endwhile ?>
                        </table>
                    </div>
                </div>
                <div class="box_transfer_language">
                    <h1>กลุ่มวิชาภาษา</h1>
                </div>
            </form> 

        </div>
    </body>
</html>
<!-- พงศกร ขำพิศ-->