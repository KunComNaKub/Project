<?php
session_start();
require 'checkAdmin.php';
require '../connect.php';
$id = $_GET['GetID'];
$query = "SELECT * FROM teacher LEFT JOIN user on teacher.User_id = user.User_id WHERE teacher.Teacher_id = $id";
$result = mysqli_query($connect,$query);
$row = $result->fetch_assoc();
$User_id = $row['User_id']; 
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $Faculty = $_POST['Faculty'];
    $Major = $_POST['Major'];


    $sql = "UPDATE user SET Username = '$username',Password = '$password' WHERE User_id = $User_id";
    $result = mysqli_query($connect,$sql);
    $sql2 = "UPDATE Teacher SET Faculty = '$Faculty' , Major = '$Major' WHERE User_id = $User_id";
    $result2 = mysqli_query($connect,$sql2);
    if($result && $result2){
        echo ("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
                window.location.href='add-user-teacher.php';</script>");
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
                    <h2> รายละเอียด ชื่่อผู้ใช้งาน อาจารย์  <?php echo $row['Prefix']; echo '&nbsp'; echo $row['Fname'];echo '&nbsp&nbsp'; echo $row['Lname']; ?></h2>
                    <form action = "" Method = 'POST'>
                        <table>
                            <tr>
                                <td>Username</td>
                                <td><input type = 'text' name = 'username' value = '<?php echo $row['Username'] ?>'></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type = 'text' name = 'password' value = '<?php echo $row['Password'] ?>'></td>
                            </tr>
                            <tr>
                                <td>คณะ</td>
                                <td><select class="Faculty" name="Faculty">
                                <option>-------โปรดเลือกคณะ-------</option>
                                <option value="บริหารธุรกิจและเทคโนโลยีสารสนเทศ"<?php if($row['Faculty'] == 'บริหารธุรกิจและเทคโนโลยีสารสนเทศ'){echo "selected";}?>>บริหารธุระกิจและเทคโนโลยีสารสนเทศ</option>
                                <option value="ศิลปะศาสตร์"<?php if($row['Faculty'] == 'ศิลปะศาสตร์'){echo "selected";}?>>ศิลปะศาสตร์</option>
                            </select>
                                </td>
                            </tr>
                            <tr>
                                <td>สาขา</td>
                                <td><select class="Major" name = "Major">
                                <option>-------โปรดเลือกสาขา-------</option>
                                <option value="วิทยาการสารสนเทศ"<?php if($row['Major'] == 'วิทยาการสารสนเทศ'){echo "selected";}?>>วิทยาการสารสนเทศ</option>
                                <option  value="การตลาด"<?php if($row['Major'] == 'การตลาด'){echo "selected";}?>>การตลาด</option>
                                <option  value="บัญชี"<?php if($row['Major'] == 'บัญชี'){echo "selected";}?>>บัญชี</option>
                                </select></td>
                            </tr>
                        </table>
                        <input type = "submit" name ='submit' value = ยืนยัน>
                        <a href = "add-user-teacher.php">ย้อนกลับ</a>
                    </form>
                </div>
            </section>

</body>
</html>
