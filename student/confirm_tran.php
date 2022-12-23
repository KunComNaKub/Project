<?php
session_start();
require 'checkStd.php';
require '../connect.php';
$Student_id = $_GET['ID'];
if(isset($_POST['confirm-tran'])){
    $confirm_str = "UPDATE student_detail SET std_confirm_tran = 1 where Student_id = $Student_id";
    if(mysqli_query($connect,$confirm_str))
    echo("<script LANGUAGE='Javascript'>window.alert('ยืนยันการเทียบโอนเรียบร้อยแล้ว');
    window.location.href='transfer_student.php?GetID=$Student_id';</script>");
}
if(isset($_POST['c-confirm-tran'])){
    $confirm_str = "UPDATE student_detail SET std_confirm_tran = 0 where Student_id = $Student_id";
    if(mysqli_query($connect,$confirm_str))
    echo("<script LANGUAGE='Javascript'>window.alert('ยกเลิก');
    window.location.href='transfer_student.php?GetID=$Student_id';</script>");
}


?>
<!-- พงศกร ขำพิศ-->