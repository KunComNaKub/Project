<?php
session_start();
require 'checkStd.php';
require '../connect.php';
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
        <header   header class="header">
            <img src="../picture/มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก.png" class="logo">
        </header>
        <div class ="container_transfer">

            <form class = "box_transfer">
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
                            </tr>
                            <?php 
                            $sql = "SELECT * FROM subject WHERE Group_Category = 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์' AND Group_sub = 'รายวิชาบังคับ' "; 
                            $result = $connect->query($sql);
                            while ($row = $result ->fetch_assoc()):
                             ?>
                            <tr>
                                <td><?php echo $row['Group_course'] ?></td>
                                <td><?php echo $row['Course_code']?></td>
                                <td><?php echo $row['Name_sub']?></td>
                                <td><?php echo $row['Credit']?></td>
                            
                                <td><input type = "text" name = "Subject_idtran" class="tranfer-validate"></td>
                                <td><input type = "text" name = "Subject_nametran" class="tranfer-validate"></td>
                                <td><input type = "text" name = "Credit_tran"></td>
                                <td><input type = "text" name = "Gpa_tran"></td>
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
                            </tr>
                            <?php 
                            $sql = "SELECT * FROM subject WHERE Group_Category = 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์' AND Group_sub = 'รายวิชาสังคมศาสตร์' "; 
                            $result = $connect->query($sql);
                            while ($row = $result ->fetch_assoc()):
                             ?>
                        <tr>
                            <td><?php echo $row['Group_course'] ?></td>
                            <td><?php echo $row['Course_code']?></td>
                            <td><?php echo $row['Name_sub']?></td>
                            <td><?php echo $row['Credit']?></td>
                            
                            <td><input type = "text" name = "Subject_idtran" class="tranfer-validate"></td>
                            <td><input type = "text" name = "Subject_nametran" class="tranfer-validate"></td>
                            <td><input type = "text" name = "Credit_tran"></td>
                            <td><input type = "text" name = "Gpa_tran"></td>
                            <?php endwhile ?>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="box_transfer_language">
                    <h1>กลุ่มวิชาภาษา</h1>
                </div>




                <div class = "box-btn-tranfer">
                    <input type ="submit" name = "btn-submit-tranfer" value = "ยืนยัน">
                </div>
            </form>
             
        </div>
        
        <script src="transfer_std_validation.js"></script>
    </body>
    </html>
