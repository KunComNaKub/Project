<?php
session_start();
require 'checkStd.php';
require '../connect.php';
if(isset($_POST['btn-add-transfer'])){
    
    $id = $_SESSION['student_name_login'];
    $sql2 = "SELECT * FROM student_detail WHERE User_id = $id";
    $result2 = $connect->query($sql2);
    $row2 = $result2->fetch_assoc();

    $Subject_id = $_GET['ID'];
    $Student_id = $row2['Student_id'];
    $Student_year = $row2['Student_year'];
    $Subject_idtrann = $_POST['Subject_idtran'];
    $Subject_nametrann = $_POST['Subject_nametrann'];
    $Credit_tran = $_POST['Credit_tran'];
    $Gpa_tran =$_POST['Gpa_tran'];

    if($Subject_idtrann == "" || $Subject_nametrann == "" || $Credit_tran == "" || $Gpa_tran == ""){
        echo("<script LANGUAGE='Javascript'>window.alert('กรุณากรอกข้อมูลให้ครบ');
        window.location.href='transfer_student.php?GetID=$Student_id';</script>");
    }
    else{
        
        $check_nametran2 = "SELECT * FROM  transfer_std WHERE Student_id = $Student_id && Subject_nametran = '$Subject_nametrann' LIMIT 1";
        $result4 = mysqli_query($connect,$check_nametran2);
        $check_subname = mysqli_fetch_assoc($result4);

        $check_subtran_id = "SELECT * FROM transfer_std WHERE Student_id = $Student_id && Subject_idtran = '$Subject_idtrann' LIMIT 1";
        $result5 = mysqli_query($connect,$check_subtran_id);
        $check_idtran = mysqli_fetch_assoc($result5);

        $check_subjecttrans_id = "SELECT * FROM transfer_std WHERE Student_id = $Student_id && Subjecttrans_id = $Subject_id LIMIT 1";
        $result6 = mysqli_query($connect,$check_subjecttrans_id);
        $checksubjecttrans_id = mysqli_fetch_assoc($result6);

        if(empty($check_subname)){
            $check_subname['Subject_nametran'] = 0;
        }
        if(empty($check_idtran)){
            $check_idtran['Subject_idtran'] = 0;
        }
        if(empty($checksubjecttrans_id)){
            $checksubjecttrans_id['Subjecttrans_id'] = "null";
        }
        if($check_idtran['Subject_idtran'] === $Subject_idtrann || $check_subname['Subject_nametran'] === $Subject_nametrann || $checksubjecttrans_id['Subjecttrans_id'] === $Subject_id){
            echo("<script LANGUAGE='Javascript'>window.alert('รหัสวิชานี้หรือชื่อวิชานี้หรือวิชาที่คุณเลือกถูกใช่ไปแล้ว');
            window.location.href='transfer_student.php?GetID=$Student_id';</script>");
        
        }else{
            $query = "INSERT INTO transfer_std(Student_id,Subjecttrans_id,Subject_idtran,Subject_nametran,Credit_tran,Gpa_tran,Year_tran) VALUE ('$Student_id','$Subject_id','$Subject_idtrann','$Subject_nametrann','$Credit_tran','$Gpa_tran','$Student_year')";
            $result = mysqli_query($connect,$query);
            if($result){
                echo ("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
            window.location.href='transfer_student.php?GetID=$Student_id';</script>");
                
               
            }
            else{
                echo "เกิดข้อผิดพลาด";
            }
        }
    }
    
}


?>
<!-- พงศกร ขำพิศ-->