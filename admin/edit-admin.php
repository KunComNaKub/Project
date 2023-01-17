<?php
session_start();
require 'checkAdmin.php';
require '../connect.php';
$id = $_GET['GetID'];
$query = "SELECT * FROM admin_list LEFT JOIN user on admin_list.User_id = user.User_id WHERE admin_list.User_id = $id";
$result = mysqli_query($connect,$query);
$row = $result->fetch_assoc();
$User_id = $row['User_id'];
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql =  "UPDATE user SET Username = '$username', Password = '$password' WHERE User_id = $id";
    $result = mysqli_query($connect,$sql);
    if($result){
        echo ("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
                window.location.href='add-admin.php';</script>");
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='styleadmin.css'>
    <title>Document</title>
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

            <section class="home">
                <div class= "container-box">
                    <h2>รายละเอียด admin <?php echo $row['Prefix']; echo '&nbsp'; echo $row['Fname']; echo '&nbsp&nbsp'; echo $row['Lname'];?></h2>
                    <form action = "" Method = "POST">
                    <table>
                        <tr>
                            <td>Username</td>
                            <td><input type = "text" name = "username" value = "<?php echo $row['Username'] ?>" required></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type = "text" name = "password" value = "<?php echo $row['Password'] ?>" required></td>
                        </tr>
                    </table>
                    <input type = "submit" name ='submit' value = ยืนยัน>
                    <a href = "add-admin.php">ย้อนกลับ</a>
                    <form>
                </div>
            </section>
</body>
</html>


<!-- พงศกร ขำพิศ -->