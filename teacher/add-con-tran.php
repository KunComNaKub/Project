<?php
session_start();
require 'checkTeacher.php';
require '../connect.php';



if(isset($_POST['submit'])){
    $id = $_GET['GetID'];
    $sql2 = "SELECT * FROM student_detail WHERE Student_id = $id";
    $result2 = $connect->query($sql2);
    $row2 = $result2->fetch_assoc();

    $Student_id = $row2['Student_id'];
    $name_adivisor = $_POST['name_adivisor'];
    $name_chief = $_POST['name_chief'];
    $name_president = $_POST['name_president'];
    $name1 = $_POST['name_1'];
    $name2 = $_POST['name_2'];
    $name3 = $_POST['name_3'];
    $name4 = $_POST['name_4'];
    $name5 = $_POST['name_5'];

    $check = "SELECT * FROM detail_confirm_tran WHERE Student_id = $Student_id";
    $result_check = mysqli_query($connect,$check);
    $check_con = mysqli_fetch_assoc($result_check);

    if(empty($check_con)){
        $check_con['Student_id'] = 0;
    }
    if($check_con['Student_id'] === $Student_id){
        $query = "UPDATE detail_confirm_tran SET name_advisor = '$name_adivisor' , name_chief = '$name_chief' ,name_president = '$name_president',name_1 = '$name1',name_2 = '$name2',name_3 = '$name3' , name_4 = '$name4' , name_5 = '$name5' WHERE Student_id = $Student_id";
        $result = mysqli_query($connect,$query);
        if($result){
            echo ("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
            window.location.href='estimate-std.php?GetID=$id';</script>");
        }
    }
    else{
        $query = "INSERT INTO detail_confirm_tran(Student_id,name_advisor,name_chief,name_president,name_1,name_2,name_3,name_4,name_5) value ('$Student_id','$name_adivisor','$name_chief','$name_president','$name1','$name2','$name3','$name4','$name5') ";
        $result = mysqli_query($connect,$query);
        $query2 = "UPDATE student_detail SET std_confirm_tran = '2' WHERE Student_id = '$Student_id' ";
        $result2 = mysqli_query($connect,$query2);
        if($result && $result2){
            echo ("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
            window.location.href='estimate-std.php?GetID=$id';</script>");
        }
    }
}
?>
<!-- พงศกร ขำพิศ -->