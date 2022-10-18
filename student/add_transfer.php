<?php
require 'checkStd.php';
require '../connect.php';

if(isset($_POST['btn-submit-tranfer'])){
    echo("<script LANGUAGE='Javascript'>window.alert('รหัสวิชานี่ถูกใช่ไปแล้วหรือชื่อวิชานี้ถูกใช่ไปแล้ว');
            window.location.href='admin_manageSub.php';</script>");
}
?>