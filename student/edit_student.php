<?php
session_start();
require 'checkStd.php';
require '../connect.php';
$id = $_SESSION['student_name_login'];
$sql = "SELECT * FROM student_detail, user WHERE student_detail.User_id = $id AND user.User_id = $id ";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
$Student_id = $row['Student_id'];
$Fname = $row['Fname'];
$Lname = $row['Lname'];
$Student_idcard = $row['Student_idcard'];
$Faculty = $row['Faculty'];
$Major = $row['Major'];
$student_year = $row['Student_year'];

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
    <header class="header">
            <a href="stdHome.php"><img src="../picture/มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก.png" class="logo"></a>
        </header>
        <div class ="container-edit-std">
            <form action="update_stdprofile.php?ID=<?php echo $Student_id ?>" method="POST">
                <h2>แก้ไขข้อมูลนักศึกษา</h2>
                <div>
                    <label>ชื่อ :</label>
                    <input type="text" id="Fname" name="Fname" value="<?php echo $Fname ?>">
                </div>
                <div>
                    <label>นามสกุล :</label>
                    <input type="text" id="Lname" name="Lname" value="<?php echo $Lname ?>">
                </div>
                <div>
                    <label>เลขประจำตัวประชาชน :</label>
                    <input type="text" id="Student-idcard" name="Student-idcard" value="<?php echo $Student_idcard ?>">
                </div>
                <div>
                    <label>คณะ :</label>
                    <select class="Faculty" name="Faculty">
                        <option>-------โปรดเลือกคณะ-------</option>
                        <option value="บริหารธุรกิจ"<?php if($Faculty == 'บริหารธุรกิจ'){echo "selected";}?>>บริหารธุระกิจและเทคโนโลยีสารสนเทศ</option>
                        <option value="ศิลปะศาสตร์"<?php if($Faculty == 'ศิลปะศาสตร์'){echo "selected";}?>>ศิลปะศาสตร์</option>
                    </select>
                </div>
                <div>
                    <label>สาขา :</label>
                    <select class="Major" name = "Major">
                        <option>-------โปรดเลือกสาขา-------</option>
                        <option value="วิทยาการสารสนเทศ"<?php if($Major == 'วิทยาการสารสนเทศ'){echo "selected";}?>>วิทยาการสารสนเทศ</option>
                        <option  value="การตลาด"<?php if($Major == 'การตลาด'){echo "selected";}?>>การตลาด</option>
                        <option  value="บัญชี"<?php if($Major == 'บัญชี'){echo "selected";}?>>บัญชี</option>
                    </select>
                </div>
                <div>
                    <label?>ปีการศึกษา :</label>
                    <input type='text' placeholder="ปีการศึกษา" name='student_year' value= "<?php echo $student_year ?>">
                </div>
                <div>
                    <input type="submit" name="btn-update-std-profile" value="ยืนยันอัพเดต" class="confirm-add">
                </div>
            </form>
        </div>
    </body>
</html>