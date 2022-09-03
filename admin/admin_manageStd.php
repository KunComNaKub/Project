<?php
session_start();
require 'checkAdmin.php';
require '../connect.php';
if (isset($_POST['btn-search'])){
    $name = $_POST["searchStd"];
    $sql = "SELECT * FROM student_detail WHERE Fname LIKE '%$name%' ORDER BY Fname ASC"; 
}
else{$sql = "SELECT * FROM student_detail";
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
    <!--web forms-->
    <header class="header">
            <div class="logo"><h1>Some Logo</h1></div>
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
                                <a href ="#">
                                    <span class="text nav-text">จัดการวิชา</span>
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
                    <span>รายชื่อนักศึกษา</span>
                    <div class="search-name">
                        <form action = "admin_manageStd.php" class="form-group" method="POST">
                        <input type="text" placeholder="Search.." name="searchStd">
                        <input type="submit" value="ค้นหา" name="btn-search" class="btn-search">
                        </form>
                        <div class="box-add-std">
                            <button id="btn-add-std" > เพิ่มรายชื่อ </button>
                        </div>
                        <div class="overlay">
                        <div class="popup-add-std">
                            <div class="close-btn">&times;</div>
                            <form class="form" action="add-user-std.php" method="POST" >
                                <h2>เพิ่มรายชื่อ</h2>
                                <div class="form-element-std">
                                    <label for="username">username</label>
                                    <input type="text" id="stdLname" name="username-std">
                                </div>
                                <div class="form-element-std">
                                    <label for="password">password</label>
                                    <input type="text" id="stdLname" name="password-std">
                                </div>
                                <div class="form-element-std">
                                    <label for="Fname">ชือ</label>
                                    <input type="text" id="stdFname" name="fname-std">
                                </div>
                                <div class="form-element-std">
                                    <label for="Lname">นามสกุล</label>
                                    <input type="text" id="stdLname" name="lname-std">
                                </div>
                                <div class="form-element-std">
                                    <label for="faculty">คณะ</label>
                                    <select name="faculty-std">
                                        <option class="plz-select-choice">------- โปรดเลือกคณะ -------</option>
                                        <option value="บริหารธุรกิจ">บริหารธุระกิจ</option>
                                        <option value="ศิลปะศาสตร์">ศิลปะศาสตร์</option>
                                    </select>
                                </div>
                                <div class="form-element-std">
                                    <label for="major">สาขา</label>
                                    <select name="major-std">
                                        <option class="plz-select-choice">------- โปรดเลือกสาขา -------</option>
                                        <option value="วิทยาการสารสนเทศ">วิทยาการสารสนเทศ</option>
                                        <option value="การตลาด">การตลาด</option>
                                        <option value="บัญชี">บัญชี</option>
                                    </select>
                                </div>
                                <div class="form-element-std">
                                    <input type="submit" name="submit-add-std" value="ยืนยัน" class="confirm-add">
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                   
                    <form action="admin_manageStd.php" class="container-box-innerbox" method ="POST">
                        <table>
                            <tr>
                                <td><input type="submit" value="ชื่อ-สกุล" name="stdname" class="input"></td>
                                <td><input type="submit" value="คณะ" name="stdfac" class="input"></td>
                                <td><input type="submit" value="สาขา" name="stdname" class="input"></td>
                                <td>ดูข้อมูล/แก้ไข</td>
                            </tr>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['Fname']; echo "&nbsp&nbsp" ;echo $row['Lname'];?></td>
                                <td><?php echo $row['Faculty'];?></td>
                                <td><?php echo $row['Major'];?></td>
                                <td><input type="submit" value="ดูข้อมูล/แก้ไข" name= "btn-std-modify"></td>
                            </tr>
                            <?php endwhile ?>
                        </table>
                    </form>
                </div>
                
            </section>




        <script src="popup-add-std.js"></script>
</body>
</html>
<!--พงศกร ขำพิศ-->