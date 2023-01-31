<?php
session_start();
require 'checkAdmin.php';
require '../connect.php';
if(isset($_POST['btn-update-sub']))

{
    $Subject_id = $_GET['ID'];
    $Course_code = $_POST['course-code'];
    $Name_sub = $_POST['name-sub'];
    $Group_Category = $_POST['sub-catagorie'];
    $Group_sub = $_POST['group-sub'];
    $Faculty = $_POST['sub-faculty'];
    $Group_course = $_POST['group-course'];
    $Sub_Year = $_POST['course-year'];
    $Credit = $_POST['credit-sub'];
    if($Course_code == "" || $Name_sub == "" || $Group_Category == "------- โปรดเลือกกลุ่มวิชา -------" || $Group_sub == "------- โปรดเลือกกลุ่ม -------" || $Faculty == "------- โปรดเลือกคณะ -------" || $Group_course == "------ โปรดเลือกหมวดวิชา -------" || $Sub_Year == "" || $Credit == ""){
        echo("<script LANGUAGE='Javascript'>window.alert('กรุณากรอกข้อมูลให้ครบ');
        window.location.href='admin_manageStd.php';</script>");
    }
    else{
        $coursecode_check = "SELECT * FROM subject Where  Subject_id != '$Subject_id' AND Course_code = '$Course_code' LIMIT 1 ";
        $result1 = mysqli_query($connect,$coursecode_check);
        $Name_sub_check = "SELECT * FROM subject Where Subject_id != '$Subject_id' AND Name_sub = '$Name_sub' LIMIT 1";
        $result2 = mysqli_query($connect,$Name_sub_check);
        $coursecode = mysqli_fetch_assoc($result1);
        $namesub = mysqli_fetch_assoc($result2);
    
        if($coursecode['Course_code'] === $Course_code || $namesub['Name_sub'] === $Name_sub){
            echo("<script LANGUAGE='Javascript'>window.alert('รหัสวิชานี่ถูกใช่ไปแล้วหรือชื่อวิชานี้ถูกใช่ไปแล้ว');
            window.location.href='admin_manageSub.php';</script>");
        }else{
            $query = "UPDATE subject SET Course_code = '$Course_code' , Name_sub = '$Name_sub', Group_Category = '$Group_Category' ,Group_sub ='$Group_sub', Faculty ='$Faculty', Group_course = '$Group_course',Sub_Year = '$Sub_Year', Credit = '$Credit' WHERE Subject_id = '$Subject_id'";
            $result = mysqli_query($connect,$query);
            if($result){
                echo ("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
                window.location.href='admin_manageSub.php';</script>");
            }
            else{
                echo "เกิดข้อผิดพลาด";
            }
        }

    }
}
if(isset($_POST['btn-delete-sub']))
{
    $Subject_id = $_GET['ID'];
    $query = "DELETE from subject WHERE Subject_id = '$Subject_id'";
    $result = mysqli_query($connect,$query);
    if($result){
        echo ("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
        window.location.href='admin_manageSub.php';</script>");
    }
    else{
        echo "เกิดข้อผิดพลาด";
    }
}
?>
<!-- พงศกร -->