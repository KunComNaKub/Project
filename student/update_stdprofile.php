<?php
session_start();
require 'checkStd.php';
require '../connect.php';
if(isset($_POST['btn-update-std-profile']))
{
    $Student_id = $_GET['ID'];
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Student_idcard = $_POST['Student-idcard'];
    $Faculty = $_POST['Faculty'];
    $Major = $_POST['Major'];
    $Student_year = $_POST['student_year'];
    $Phone_std = $_POST['phone_std'];
    $Email_std = $_POST['email_std'];
    if($Fname == "" || $Lname == "" || $Student_idcard == "" || $Faculty == "" || $Major == "" || $Student_year == ""){
        echo("<script LANGUAGE='Javascript'>window.alert('กรุณากรอกข้อมูลให้ครบ');
        window.location.href='stdHome.php';</script>");
    }
    else{
        $query = "UPDATE Student_detail SET Fname = '$Fname', Lname = '$Lname' , Student_idcard = '$Student_idcard', Faculty = '$Faculty' ,Major = '$Major' ,Student_year = '$Student_year',Phone_std = '$Phone_std',Email_std = '$Email_std' WHERE Student_id = $Student_id";
        $result = mysqli_query($connect,$query);
        if($result){
            echo ("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
            window.location.href='stdHome.php';</script>");
        }
        else{
            echo "เกิดข้อผิดพลาด";
        }
    }
}

?>
<!-- พงศกร -->