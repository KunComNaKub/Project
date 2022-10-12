<?php
session_start();
require 'checkAdmin.php';
require '../connect.php';
if(isset($_POST['btn-search-catagorie'])){
    $faculty = $_POST['select-faculty'];
    $groupcoures = $_POST['select-groupcoures'];
    $catagorie = $_POST['select-catagorie'];
    $groupcatagorie = $_POST['group-sub-catagorie'];
    $name = $_POST["searchSub"];
    $sub_year = $_POST["sub-year"];
    $sql = "SELECT * FROM subject WHERE Faculty LIKE '%$faculty%' AND Group_course LIKE '%$groupcoures%' AND Group_Category Like '%$catagorie%'AND Group_sub Like '%$groupcatagorie%' AND Name_sub LIKE '%$name%' AND Sub_year LIKE '%$sub_year%' ";
}
else if (isset($_POST['btn-search-catagorie'])){
    $name = $_POST["searchSub"];
    $sql = "SELECT * FROM subject WHERE Name_sub LIKE '%$name%' ORDER BY Name_sub ASC"; 
}

else{$sql = "SELECT * FROM subject";
}

$result = $connect->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='styleadmin.css'>   
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
                                <a href ="Admin_manageSub.php">
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
                <div class= "container-box">
                    <span>รายวิชา</span>
                    <div class="search-group">
                        <form action="admin_manageSub.php" class="form-group" method="post">
                            <input type="text" placeholder="Search.." name="searchSub">
                            <span>คณะ</span>
                            <select name="select-faculty" id = "select-faculty">
                                <option value="">เลือกคณะทั้งหมด</option>
                                <option value="บริหารธุรกิจ">บริหารธุรกิจ</option>
                                <option value="ศิลปะศาสตร์">ศิลปะศาสตร์</option>
                            </select>
                            <span>หมวดวิชา</span>
                            <select name="select-groupcoures">
                                <option value="">เลือกหมวดวิชาทั้งหมด</option>
                                <option value="ศึกษาทั่วไป-บังคับ">ศึกษาทั่วไป-บังคับ</option>
                                <option value="ศึกษาทั่วไป-เลือก">ศึกษาทั่วไป-เลือก</option>
                                <option value="เฉพาะ-แกน">เฉพาะ-แกน</option>
                                <option value="เฉพาะ-เลือก">เฉพาะ-เลือก</option>
                                <option value="เลือกเสรี">เลือกเสรี</option>
                            </select>
                            <span>กลุ่มวิชา</span>
                            <select class="select-catagorie" name="select-catagorie">
                                <option value="">เลือกกลุ่มวิชาทั้งหมด</option>
                                <option value="กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์">กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์</option>
                                <option value="กลุ่มภาษา">กลุ่มภาษา</option>
                                <option value="กลุ่มวิทยาศาสตร์และคณิตศาสตร์">กลุ่มวิทยาศาสตร์และคณิตศาสตร์</option>
                                <option value="กลุ่มบูรณาการ">กลุ่มบูรณาการ</option>
                                <option value="กลุ่มวิชาแกน">กลุ่มวิชาแกน</option>
                                <option value="กลุ่มวิชาฝึกงานและประสบการณ์">กลุ่มวิชาฝึกงานและประสบการณ์</option>
                            </select>
                            <span>กลุ่ม</span>
                            <select class = "group-sub-catagorie" name= "group-sub-catagorie">
                                <option value="">เลือกกลุ่ม</option>
                            </select>
                            <input type= "text" placeholder="ปีการศึกษา" name = "sub-year">
                            <input type="submit" value="ค้นหา" name="btn-search-catagorie" class="btn-catagorie">
                        </form>
                    </div> 
                    <div class="search-name">
                        <div class="box-add-sub">
                            <button id="btn-add-sub"> เพิ่มวิชา</button>
                        </div>
                        <div class="overlay">
                            <div class="poppup-add-sub">
                                <div class="close-btn">&times;</div>
                                <form class="form" action="add-sub.php" method="post">
                                    <h2>เพิ่มวิชา</h2>
                                    <div class="form-element-sub">
                                        <label for="sub-faculty">คณะ</label>
                                        <select name="sub-faculty">
                                            <option class="plz-select-choice">------- โปรดเลือกคณะ -------</option>
                                            <option value="บริหารธุรกิจ">บริหารธุระกิจและเทคโนโลยีสารสนเทศ</option>
                                            <option value="ศิลปะศาสตร์">ศิลปะศาสตร์</option>
                                        </select>
                                    </div>
                                    <div class="form-element-sub">
                                        <label for="sub-catagorie">กลุ่มรายวิชา</label>
                                        <select class="sub-catagorie" name="sub-catagorie">
                                            <option class="plz-select-chioce">------- โปรดเลือกกลุ่มวิชา -------</option>
                                            <option value="กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์">กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์</option>
                                            <option value="กลุ่มภาษา">กลุ่มภาษา</option>
                                            <option value="กลุ่มวิทยาศาสตร์และคณิตศาสตร์">กลุ่มวิทยาศาสตร์และคณิตศาสตร์</option>
                                            <option value="กลุ่มบูรณาการ">กลุ่มบูรณาการ</option>
                                            <option value="กลุ่มวิชาแกน">กลุ่มวิชาแกน</option>
                                            <option value="กลุ่มวิชาฝึกงานและประสบการณ์">กลุ่มวิชาฝึกงานและประสบการณ์</option>
                                            <option value="เลือกเสรี">เลือกเสรี</option>
                                        </select>
                                    </div>
                                    <div class="form-element-sub">
                                        <label for="group-course">หมวดวิชา</label>
                                        <select name="group-course">
                                            <option class="plz-select-choice">------ โปรดเลือกหมวดวิชา -------</option>
                                            <option value="ศึกษาทั่วไป-บังคับ">ศึกษาทั่วไป-บังคับ</option>
                                            <option value="ศึกษาทั่วไป-เลือก">ศึกษาทั่วไป-เลือก</option>
                                            <option value="เฉพาะ-แกน">เฉพาะ-แกน</option>
                                            <option value="เฉพาะ-เลือก">เฉพาะ-เลือก</option>
                                            <option value="เลือกเสรี">เลือกเสรี</option>
                                        </select>
                                    </div>
                                    <div class="form-element-sub">
                                        <label for="group-sub">กลุ่ม</label>
                                        <select class="group-sub" name="group-sub">
                                            <option class="plz-select-choice">------- โปรดเลือกกลุ่ม -------</option>
                                        </select>
                                    </div>
                                    <div class="form-element-sub">
                                        <label for="sub-coursecode">รหัสวิชา</label>
                                        <input type="text" id="sub-coursecode" name="course-code">
                                    </div>
                                    <div class="form-element-sub">
                                        <label for="name-sub">ชื่อวิชา</label>
                                        <input type="text" id="name-sub" name="name-sub">
                                    </div>
                                    <div class="form-element-sub">
                                        <label for="credit-sub">หน่วยกิต</label>
                                        <input type="text" id="credit-sub" name="credit-sub">
                                    </div>
                                    <div class="form-element-sub">
                                        <label for="course-year">ปีการศึกษา</label>
                                        <input type="text" id="course-year" name="course-year">
                                    </div>
                                    <div class="form-element-sub">
                                        <input type="submit" name="submit-add-sub" value="ยืนยัน" class="confirm-add">
                                    </div>
                                </form>
                            </div>
                        </div> 
                    </div>

                    <div class="table-show-subject">
                    <table>
                        <tr>
                            <td>คณะ</td>
                            <td>กลุ่มรายวิชา</td>
                            <td>หมวดวิชา</td>
                            <td>กลุ่ม</td>
                            <td>รหัสวิชา</td>
                            <td>ชื่อวิชา</td>
                            <td>หน่วยกิต</td>
                            <td>ปีการศึกษา</td>
                            <td>แก้ไข</td>
                        </tr>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['Faculty'];?></td>
                            <td><?php echo $row['Group_Category'];?></td>
                            <td><?php echo $row['Group_course'];?></td>
                            <td><?php echo $row['Group_sub'];?></td>
                            <td><?php echo $row['Course_code'];?></td>
                            <td><?php echo $row['Name_sub'];?></td>
                            <td><?php echo $row['Credit'];?></td>
                            <td><?php echo $row['Sub_Year'];?></td>
                            <td><a href = "edit_subject.php?GetID=<?php echo $row['Subject_id']?>">edit</a></td>
                        </tr>
                        <?php endwhile ?>
                    </table>
                    </div>
                </div>
            </section>
        </div>



        <script src="popup-add-sub.js"></script>
    </body>
</html>
<!--พงศกร ขำพิศ-->