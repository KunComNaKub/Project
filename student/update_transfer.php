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
    $Subject_nametran = $_POST['Subject_nametran'];
    $Credit_tran = $_POST['Credit_tran'];
    $Gpa_tran =$_POST['Gpa_tran'];
    
    
    if($Subject_idtrann == "" || $Subject_nametran == "" || $Credit_tran == "" || $Gpa_tran == ""){
        echo("<script LANGUAGE='Javascript'>window.alert('กรุณากรอกข้อมูลให้ครบ');
        window.location.href='transfer_student.php';</script>");
    }
    else{
        
        $check_nametran2 = "SELECT * FROM  transfer_std WHERE Student_id = $Student_id && Subject_nametran = '$Subject_nametran' LIMIT 1";
        $result4 = mysqli_query($connect,$check_nametran2);
        $check_subname = mysqli_fetch_assoc($result4);


        $check_subtran_id = "SELECT * FROM transfer_std WHERE Student_id = $Student_id && Subject_idtran = $Subject_idtrann LIMIT 1";
        $result5 = mysqli_query($connect,$check_subtran_id);
        $check_idtran = mysqli_fetch_assoc($result5);

        if($check_idtran['Subject_idtran'] === $Subject_idtrann || $check_subname['Subject_nametran'] === $Subject_nametran || $check_idtran['Subjecttrans_id'] === $Subject_id ){
            echo("<script LANGUAGE='Javascript'>window.alert('รหัสวิชานี้หรือชื่อวิชานี้ถูกใช่ไปแล้ว');
            window.location.href='transfer_student.php';</script>");
        
        }else{
            $query = "INSERT INTO transfer_std(Student_id,Subjecttrans_id,Subject_idtran,Subject_nametran,Credit_tran,Gpa_tran,Year_tran) VALUE ('$Student_id','$Subject_id','$Subject_idtrann','$Subject_nametran','$Credit_tran','$Gpa_tran','$Student_year')";
            $result = mysqli_query($connect,$query);
            if($result){
                echo $Subject_idtrann;
                echo $check_subname['Subject_nametran'];
                
               
            }
            else{
                echo "เกิดข้อผิดพลาด";
            }
        }
    }
    
}


?>