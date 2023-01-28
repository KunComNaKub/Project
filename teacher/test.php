<?php
session_start();
require 'checkTeacher.php';
require '../connect.php';
echo '<pre>';
    print_r($_POST);
echo '<pre>';
$id = $_GET['GetID'];
foreach($_POST['estimate'] as $item => $value){
    if($value == 'พิจารณา'){
         echo("<script LANGUAGE='Javascript'>window.alert('กรุณาเลือกผลพิจารณาให้ครบ');
            window.location.href='estimate-std.php?GetID=$id';</script>");
    }
    $sql = "UPDATE transfer_std SET Teacher_pass = '$value' WHERE id = '$item'";
    $result = mysqli_query($connect,$sql);
  
    if($result){
        $sql2 = "UPDATE student_detail SET teacher_con = 1 WHERE Student_id = $id";
        $result2 = mysqli_query($connect,$sql2);
        echo ("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');</script>");
        echo ("<script LANGUAGE='Javascript'>window.alert('กรุณากำหนดรายชื่อผู้ที่อนุมัติเทียบโอน');
        window.location.href='estimate-std.php?GetID=$id';</script>");
        
    }
    else{
        echo "เกิดข้อผิดพลาด";
    }
}
?>
<!-- พงศกร ขำพิศ -->