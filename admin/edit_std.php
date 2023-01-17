<?php
 session_start();
 require 'checkAdmin.php';
 require '../connect.php';

 $id = $_GET['GetID'];
 $query = "SELECT * FROM student_detail LEFT JOIN user on student_detail.User_id = user.User_id WHERE student_detail.Student_id = $id";
 $result = mysqli_query($connect,$query);
 $row = $result->fetch_assoc();
$User_id  = $row['User_id'];
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $Faculty = $_POST['Faculty'];
    $Major = $_POST['Major'];
    $supclass = $_POST['supclass'];
    $std_year = $_POST['std-year'];
    $phone = $_POST['phone'];
    $email_std = $_POST['email-std'];

    $sql = "UPDATE user SET Username = '$username',Password = '$password' WHERE User_id = $User_id";
    $result = mysqli_query($connect,$sql);
    $sql2 = "UPDATE student_detail SET Faculty = '$Faculty', Major = '$Major' , Supclass_std = '$supclass' , Student_year = '$std_year' , Phone_std = '$phone' , Email_std = '$email_std' WHERE User_id = $User_id";
    $result2 = mysqli_query($connect,$sql2);
    if($result && $result2){
        echo ("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
                window.location.href='admin_manageStd.php';</script>");
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
        <link rel='stylesheet' type='text/css' media='screen' href='styleadmin.css'>   
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
                <h2>รายละเอียด นศ <?php echo $row['Prefix']; echo '&nbsp'; echo $row['Fname']; echo '&nbsp&nbsp'; echo $row['Lname']; ?></h2>
                <form action = "" Method = 'POST'>
                <table>
                    <tr>
                        <td>username/รหัสนักศึกษา</td>
                        <td><input type = 'text' name = "username" value = "<?php echo $row['Username'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type = 'text' name = "password" VALUE = "<?php echo $row['Password'] ?>"></td>
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
                    <tr>
                        <td>ภาค</td>
                        <td><select class= "supclass" name = "supclass">
                            <option>-----โปรดเลือกภาคการเรียน-----</option>
                            <option value="ภาคปกติ"<?php if($row['Supclass_std'] == 'ภาคปกติ'){echo "selected";} ?>>ภาคปกติ</option>
                            <option value="ภาคสมทบ" <?php if($row['Supclass_std'] == 'ภาคสมทบ'){echo "selected";} ?>>ภาคสมทบ</option>
                        </td>
                    </tr>
                    <tr>
                        <td>ปีการศึกษา</td>
                        <td><input type = "text" name = 'std-year' value = '<?php echo $row ['Student_year'] ?>'></td>
                    </tr>
                    <tr>
                        <td>โทรศัพท์</td>
                        <td><input type = 'text' name = 'phone' value = '<?php echo $row ['Phone_std'] ?>' ></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type = 'text' name = 'email-std' value = '<?php echo $row ['Email_std']?>'></td>
                    </tr>
                </table>
                    <input type = "submit" name ='submit' value = ยืนยัน>
                    <a href = "admin_manageStd.php">ย้อนกลับ</a>
                </form>
                </div>
            </section>

</body>
</html>
<!-- พงศกร ขำพิศ -->