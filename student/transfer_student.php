<?php
session_start();
require 'checkStd.php';
require '../connect.php';
$id = $_SESSION['student_name_login'];
$sql = "SELECT * FROM student_detail, user WHERE student_detail.User_id = $id AND user.User_id = $id ";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
$Student_id = $row['Student_id'];

if(isset($_REQUEST['submit_delete'])){
    if($_REQUEST['Subject_idtran'] == ""){
        echo ("<script LANGUAGE='Javascript'>window.alert('ไม่มีรายการให้ลบ');</script>");
        $_REQUEST['Subject_idtran'] = 0;
    }else{
        $deletesup = "DELETE FROM transfer_std WHERE Subject_idtran = {$_REQUEST['Subject_idtran']} && Student_id = $Student_id";
    if(mysqli_query($connect, $deletesup)){
        echo ("<script LANGUAGE='Javascript'>window.alert('ลบสำเร็จ');</script>");
    }
    else{
        echo "ERROR";
    }}
}

$std_confirm_tran = "SELECT std_confirm_tran FROM student_detail WHERE Student_id = $Student_id";
$result_std_confirm_tran = $connect->query($std_confirm_tran);
$row_std_confirm_tran = $result_std_confirm_tran->fetch_assoc();
$value_std_confirm = $row['std_confirm_tran'];
echo "<script> var value_std_confirm = '$value_std_confirm';</script>";
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
        
        <div class ="container_transfer">
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
            <form action ="add_transfer.php?ID=<?php echo $Student_id ;?>"class = "box_transfer" method="POST">
                <?php
                function displaytable($Student_id,$catagory_group_display,$connect){
                    $sql = "SELECT * FROM subject left JOIN (SELECT * FROM transfer_std WHERE Student_id = $Student_id ) as transfer_std on subject.Subject_id = transfer_std.Subjecttrans_id WHERE Group_Category = '$catagory_group_display'";
                    $result = $connect->query($sql);
                    if($result){
                        ?>
                        <div class = "box_transfer_social">
                            <h1><?php echo $catagory_group_display ?></h1>
                            <div class="box_transfer_subject">
                                <table>
                                    <tr>
                                        <td>กลุ่มวิชา</td>
                                        <td>หมวดวิชา</td>
                                        <td>รหัสวิชา</td>
                                        <td>รายวิชาปริญาตรี มทร.ตะวันออก</td>
                                        <td>หน่วยกิต</td>
                                        <td>รหัสวิชา</td>
                                        <td>รายวิชาประกาศนียบัตรวิชาชีพชั้นสูง</td>
                                        <td>หน่วยกิต</td>
                                        <td>เกรด</td>
                                        <td>เทียบโอน</td>
                                        <td>ลบ</td>
                                    </tr>
                                    <?php
                                    while ($row = $result ->fetch_assoc()):
                                    ?>
                                    <tr>
                                        <td><?php echo $row['Group_sub'] ?></td>
                                        <td><?php echo $row['Group_course']; ?></td>
                                        <td><?php echo $row['Course_code'];?></td>
                                        <td><?php echo $row['Name_sub'];?></td>
                                        <td><?php echo $row['Credit'];?></td>
                                        <td><?php echo $row['Subject_idtran'];?></td>
                                        <td><?php echo $row['Subject_nametran'];?></td>
                                        <td><?php echo $row['Credit_tran'];?></td>
                                        <td><?php echo $row['Gpa_tran'];?></td>
                                        <td><a class = "btn_link_tran " href ="add_transfer.php?GetID=<?php echo $row['Subject_id'] ?>">เทียบโอน</td>
            </form> 
            <?php
            echo '
                                        <td><form action = "" method = "POST">
                                            <input type = "hidden" name = "Subject_idtran" value = '.$row['Subject_idtran'].'>
                                            <input type ="submit" class="btn_delete_trans" name ="submit_delete" value = "ลบ"></form></td>
                                            ';?>
                                        <?php endwhile ?>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <?php
                    } else{
                        echo "ERROR: " . $connect->error;
                    }
                }

                displaytable($Student_id,"กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์",$connect);
                displaytable($Student_id,"กลุ่มภาษา",$connect);
                displaytable($Student_id,"กลุ่มวิทยาศาสตร์และคณิตศาสตร์",$connect);
                displaytable($Student_id,"กลุ่มบูรณาการ",$connect);
                displaytable($Student_id,"กลุ่มวิชาแกน",$connect);
                displaytable($Student_id,"กลุ่มวิชาฝึกงานและประสบการณ์",$connect);
                ?>


            <form action = "confirm_tran.php?ID=<?php echo $Student_id ?>" method = "POST"> 
                <input class ="btn-confirm-tran" type="submit" name="confirm-tran" value="ยืนยันอัพเดต" >
                <input class ="btn-cancle_tran" type="submit" name="c-confirm-tran" value="ยกเลิก">

                
    </body>
    <script src="std_confirm_tran.js"></script>
</html>
<!-- พงศกร ขำพิศ-->