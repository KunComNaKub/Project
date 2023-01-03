<?php
session_start();
require 'checkStd.php';
require '../connect.php';
$id = $_SESSION['student_name_login'];
$sql = "SELECT * FROM student_detail, user WHERE student_detail.User_id = $id AND user.User_id = $id ";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
$student_id = $row['Student_id'];

if(isset($_GET)){

    unlink('uploads/'.$row['Pic_grad']);
    $sql2 = "UPDATE Student_detail SET Pic_grad = NULL WHERE Student_id = $student_id";
    $result2 = mysqli_query($connect,$sql2);
    if($result2){
        echo ("<script LANGUAGE='Javascript'>window.alert('ลบสำเร็จ');
        window.location.href='stdHome.php';</script>");
    }
    else{
        echo "เกิดข้อผิดพลาด";
    }
}
?>
<!-- พงศกร ขำพิศ -->