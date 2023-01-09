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
        echo ("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
        window.location.href='estimate-std.php?GetID=$id';</script>");
    }
    else{
        echo "เกิดข้อผิดพลาด";
    }
}
?>
<!-- พงศกร ขำพิศ -->