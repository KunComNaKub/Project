<?php
session_start();
require 'checkStd.php';
require '../connect.php';
$id = $_SESSION['student_name_login'];
$sql = "SELECT * FROM student_detail, user WHERE student_detail.User_id = $id AND user.User_id = $id ";
$result = $connect->query($sql);
$row = $result->fetch_assoc();

$value_std_confirm = $row['std_confirm_tran'];
echo "<script> var value_std_confirm = '$value_std_confirm';</script>";
if($row['Phone_std']==''){
    $row['Phone_std'] = '-';
}
if($row['Email_std'] ==''){
    $row['Email_std'] = '-';
}
if($row['Student_idcard']==''){
    $row['Student_idcard'] = '-';
}

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
        <a href="stdHome.php"><img src="../picture/มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก.png" class="logo"></a>
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
                                            <td class="text-detail-std-td"><?php echo $row['Prefix']; echo "&nbsp&nbsp" ; echo $row['Fname'];?></td>
                                            <td>นาสกุล:</td>
                                            <td class="text-detail-std-td"><?php echo $row['Lname'];?></td>
                                        </tr>
                                        <tr>
                                            <td>คณะ:</td>
                                            <td class= "text-detail-std-td"><?php echo $row['Faculty'];?></td>
                                            <td>สาขา:</td>
                                            <td class = "text-detail-std-td"><?php echo $row['Major'];?></td>
                                            <td>ภาค:</td>
                                            <td class = "text-detail-std-td"><?php echo $row['Supclass_std'];?></td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์โทรศัพท์</td>
                                            <td class = "text-detail-std-td"><?php echo $row['Phone_std'];?></td>
                                            <td>email</td>
                                            <td class = "text-detail-std-td"><?php echo $row['Email_std'];?></td>
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
                                            <a href="">
                                                <span>อัพโหลดใบ รบ</span>
                                            </a>
                                        </li>
                                        <li class="link">
                                            <a href="">
                                                <span>ลบใบ รบ</span>
                                            </a>
                                        </li>
                                    </ul>

                                </div>


                            </form>
                        </div>
                    </div>
                    <div class = "head">
                        <h2>ผลการเทียบโอน/ดูใบ รบ</h2>
                        <div class = "box-std-tran">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><h class = "pass">เทียบโอนได้รับการอนุมัติแล้ว</h>
                                            <h class = "notpass">เทียบโอนไม่ผ่านการอนุมัติ</h>
                                            <h class = "no-tran">ยังไม่ได้ทำการเทียบโอน</h>
                                            <h class = "pending">รอการพิจารณา</h>
                                        </td>
                                        <td><a href ="pdf_std_tran.php?GetID=<?php echo $row['Student_id'] ?>&ACTION=VIEW" class = "preview-std">Preview</td>
                                        <td><a href ="pdf_std_tran.php?GetID=<?php echo $row['Student_id'] ?>&ACTION=DOWNLOAD" class = "download-std">download</td>
                                        <td><a href ="" class = "download-std">ดูใบ รบ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
    <script src="std-tran.js"></script>
</html>
<!--พงศกร-->