<?php
session_start();
require 'checkAdmin.php';
require '../connect.php';
if(isset($_POST['btn-search'])){
    $name = $_POST['searchA'];
    $sql = "SELECT * FROM admin_list WHERE Fname LIKE '%$name%' order by Fname ASC";
}
else{
    $sql = "SELECT * FROM admin_list";
}
$result = $connect->query($sql);

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
                    <span>รายชื่อ Admin</span>
                        <div class="search-name">
                            <form action = "add-admin.php" class = "" method = "POST">
                                <input type="text" placeholder = "Search.." name="searchA">
                                <input type="submit" value="ค้นหา" name="btn-search" class="btn-search">
                            </form>


                        </div>
                    <div class="box-add-admin">
                        <button id="btn-add-admin">เพิ่มAdmin</button>
                    </div>
                    <div class="overlay">
                        <div class = "popup-add-admin">
                        <div class="close-btn">&times;</div>
                            <form class ="form" action="add-admin-ago.php" method="POST">
                                <h2>เพิ่มผู้งานAdmin</h2>
                                <div class="form-element-admin">
                                    <label for = "username">username</label>
                                    <input type = "text" id="Ausername" name = "Ausername"> 
                                </div>

                                <div class="form-element-admin">
                                    <label for = "password">password</label>
                                    <input type = "text" id="Apassword" name = "Apassword"> 
                                </div>

                                <div class= "form-element-admin">
                                    <label for="prefix">คำนำหน้าชื่อ </label></br>
                                    <input type="radio" name="prefix" value = "นาย"> นาย
                                    <input type="radio" name="prefix" value = "นาง"> นาง
                                </div>
                                
                                <div class = "form-element-admin">
                                    <label for="Fname">ชือ</label>
                                    <input type="text" id="AFname" name="fname-A" >
                                </div>


                                <div class = "form-element-admin">
                                    <label for="Lname">นามสกุล</label>
                                    <input type="text" id="ALname" name="Lname-A" >
                                </div>

                                <div class="form-element-admin">
                                    <input type="submit" name="submit-add-A" value="ยืนยัน" class="confirm-add">
                                </div>

                            </form>
                        </div>
                    </div>

                    <form action = "add-admin.php" class ="display-user-admin" method = "POST">
                        <table>
                            <tr>
                                <td>ชื่อ-สกุล</td>
                                <td>ดูข้อมูล/แก้ไข</td>
                            </tr>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['Prefix'];echo "&nbsp&nbsp" ; echo $row['Fname']; echo "&nbsp&nbsp" ; echo $row['Lname'];?></td>
                                <td><a href = "edit-admin.php?GetID=<?php echo $row['User_id'] ?>" class = "edit-user-admin">แก้ไข</a></td>
                            </tr>
                            <?php endwhile ?>
                        </table>
                    </form>
                </div>


                
            </section>
        <script src="popup-add-admin.js"></script>
</body>
</html>
<!-- พงศกร ขำพิศ -->