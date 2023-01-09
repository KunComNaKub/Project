<?php
session_start();
require 'checkAdmin.php';
require '../connect.php';
if (isset($_POST['btn-search'])){
    $name = $_POST['searchT'];
    $faculty = $_POST['select-faculty'];
    $major = $_POST['select-major'];
    $sql = "SELECT * FROM teacher WHERE Faculty LIKE '%$faculty%' AND Major LIKE '%$major%' AND Fname LIKE '%$name%'";
}
else if(isset($_POST['btn-search'])){
    $name = $_POST['search-name'];
    $sql = "SELECT * FROM teacher WHERE Fname LIKE '%$name%' order by Fname ASC";
}
else{
    $sql = "SELECT * FROM teacher";
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
                <span>รายชื่ออาจารย์ผู้ใช้งาน</span>
                    <div class ="search-name">
                        <form action ="add-user-teacher.php" class = "" method = "POST">
                            <input type="text" placeholder = "Search.." name="searchT">
                            <span>คณะ</span>
                            <select name = "select-faculty" name= "select-faculty">
                            <option value="">เลือกคณะทั้งหมด</option>
                            <option value="บริหารธุรกิจและเทคโนโลยีสารสนเทศ">บริหารธุรกิจและเทคโนโลยีสารสนเทศ</option>
                            <option value="ศิลปะศาสตร์">ศิลปะศาสตร์</option>
                        </select>

                        <span>สาขา</span>
                        <select name = "select-major" name= "select-major">
                            <option value="">เลือกสาขา</option>
                            <option value="วิทยาการสารสนเทศ">วิทยาการสารสนเทศ</option>
                            <option value="การตลาด">การตลาด</option>
                            <option value="บัญชี">บัญชี</option>
                        </select>
                        <input type="submit" value="ค้นหา" name="btn-search" class="btn-search">
                        </form>
                    </div>
                    <div class="box-add-teacher">
                        <button id="box-add-teacher">เพิ่มผู้งานอาจารย์</button>
                    </div>
                <div class="overlay">
                    <div class = "popup-add-teacher">
                    <div class="close-btn">&times;</div>
                    <form class="form" action ="add-teacher.php" method="POST">
                        <h2>เพิ่มผู้งานอาจารย์</h2>
                        <div class="">
                            <label for = "username">username</label>
                            <input type = "text" id="Tusername" name = "Tusername"> 
                        </div>
                        
                        <div class="">
                            <label for = "password">password</label>
                            <input type = "text" id="Tpassword" name = "Tpassword"> 
                        </div>
                        
                        <div class= "">
                            <label for="prefix">คำนำหน้าชื่อ </label></br>
                            <input type="radio" name="prefix" value = "นาย"> นาย
                            <input type="radio" name="prefix" value = "นาง"> นาง
                            <input type="radio" name="prefix" value = "นางสาว"> นางสาว
                            <input type="radio" name="prefix" value = "ผศ."> ผศ.
                            <input type="radio" name="prefix" value = "ผศ.ดร."> ผศ.ดร.
                            <input type="radio" name="prefix" value = "ดร."> ดร.
                        </div>

                        <div class = "">
                            <label for="Fname">ชือ</label>
                            <input type="text" id="TFname" name="fname-T" >
                        </div>

                        <div class = "">
                            <label for="Lname">นามสกุล</label>
                            <input type="text" id="LFname" name="Lname-T" >
                        </div>

                        <div class = "">
                            <label for="faculty">คณะ</label>
                                <select name="faculty-T">
                                    <option class="plz-select-choice">------- โปรดเลือกคณะ -------</option>
                                    <option value="บริหารธุรกิจและเทคโนโลยีสารสนเทศ">บริหารธุรกิจและเทคโนโลยีสารสนเทศ</option>
                                    <option value="ศิลปะศาสตร์">ศิลปะศาสตร์</option>
                                </select>
                        </div>

                        <div class="">
                                <label for="major">สาขา</label>
                                <select name="major-T">
                                    <option class="plz-select-choice">------- โปรดเลือกสาขา -------</option>
                                    <option value="วิทยาการสารสนเทศ">วิทยาการสารสนเทศ</option>
                                    <option value="การตลาด">การตลาด</option>
                                    <option value="บัญชี">บัญชี</option>
                                </select>
                        </div>

                        <div class="">
                            <input type="submit" name="submit-add-T" value="ยืนยัน" class="confirm-add">
                        </div>
                    </form>
                    </div>
                </div>


                <form action= "add-user-teacher.php" class ="" method = "POST">
                    <table> 
                        <tr>
                            <td>ชื่อ-สกุล</td>
                            <td>คณะ</td>
                            <td>สาขา</td>
                            <td>ดูข้อมูล/แก้ไข</td>
                        </tr>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['Prefix'];echo "&nbsp&nbsp" ; echo $row['Fname']; echo "&nbsp&nbsp" ; echo $row['Lname'];?></td>
                            <td><?php echo $row['Faculty'];?></td>
                            <td><?php echo $row['Major'];?></td>
                            <td><input type="submit" value="ดูข้อมูล/แก้ไข" name= "btn-edit"></td>
                        </tr>
                        <?php endwhile ?>
                    </table>
                </form>
            </section>
        </div>
        <script src="popup-add-teacher.js"></script>
</body>
</html>
<!-- พงศกร -->