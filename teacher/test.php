<?php
session_start();
require 'checkTeacher.php';
require '../connect.php';

$id = $_GET['GetID'];
foreach($_POST['remark'] as $item => $value){
    echo $item;
    $sqlremark = "UPDATE transfer_std SET remark = '$value' WHERE id = '$item'";
    $resultremark = mysqli_query($connect,$sqlremark);
}
foreach($_POST['estimate'] as $item => $value){
    if($value == 'พิจารณา'){
         echo("<script LANGUAGE='Javascript'>window.alert('กรุณาเลือกผลพิจารณาให้ครบ');
            window.location.href='estimate-std.php?GetID=$id';</script>");
    }
    elseif ($value == 'ไม่ผ่าน'){
        $sql3 = "UPDATE student_detail SET std_confirm_tran = 3 WHERE Student_id = $id";
        $result3 = mysqli_query($connect,$sql3);
        $sql = "UPDATE transfer_std SET Teacher_pass = '$value' WHERE id = '$item'";
        $result = mysqli_query($connect,$sql);
        echo ("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
        window.location.href='estimate-std.php?GetID=$id';</script>");
    }
    else{
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
        }}
    
}
?>
<!-- พงศกร ขำพิศ -->