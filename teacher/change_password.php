<?php
session_start();
require 'checkTeacher.php';
require '../connect.php';
$id = $_SESSION['teacher_name_login'];
if(isset($_POST['submit'])){
    $old_password = $_POST['old-password'];
    $new_password = $_POST['new-password'];
    $c_new_password = $_POST['c-new-password'];

    $sql = "SELECT * FROM user WHERE User_id = $id";
    $result = mysqli_query($connect,$sql);
    $row = $result->fetch_assoc();

    if($row['Password'] != $old_password){
        echo ("<script LANGUAGE='Javascript'>window.alert('รหัสผ่านเดิมไม่ถูกต้อง');
                window.location.href='change_password.php';</script>");
    }elseif($new_password != $c_new_password){
        echo ("<script LANGUAGE='Javascript'>window.alert('รหัสผ่านไม่ตรงกัน');
                window.location.href='change_password.php';</script>");
    }else{
        $sql2 = "UPDATE user SET Password = '$new_password' WHERE User_id = $id";
        $result3 = mysqli_query($connect,$sql2);
        if($result3){
            echo ("<script LANGUAGE='Javascript'>window.alert('เปลี่ยนรหัสผ่านสำเร็จ');
            window.location.href='change_password.php';</script>");
        }
    }

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
                <div class= "container-box">
                    <h2>เปลี่ยนรหัสผ่าน Password<h2>
                        <div class="container-CP">
                            <form action = "" method = "POST">
                                <div>
                                    <label>Password เดิม</label>
                                    <input type = 'text' name = 'old-password'>
                                </div>
                                <div>
                                    <label>Password ใหม่</label>
                                    <input type = 'text' name = 'new-password' required>
                                </div>
                                <div>
                                    <label>ยืนยัน Password ใหม่</label>
                                    <input type = 'text' name = 'c-new-password' required>
                                </div>
                                <div class="btn-submit">
                                    <input type = "submit"  name ='submit' value = ยืนยัน>
                                </div>
                            </form>
                        </div>
                </div>
            </section>
        </div>

</body>
</html>
<!-- พงศกร ขำพิศ -->