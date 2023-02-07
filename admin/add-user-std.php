<?php
require '../connect.php';
if(isset($_POST['submit-add-std'])){
    $username = $_POST['username-std'];
    $password = $_POST['password-std'];
    $prefix = $_POST['prefix'];
    $firstname = $_POST['fname-std'];
    $lastname = $_POST['lname-std'];
    $faculty = $_POST['faculty-std'];
    $major = $_POST['major-std'];
    $student_year = $_POST['student_year'];
    $supclass = $_POST['supclass-std'];
    $std_scheme = $_POST['std_scheme'];
 
    if($username == "" || $password == "" || $firstname == "" || $lastname == "" || $faculty == "------- โปรดเลือกคณะ -------" || $major == "------- โปรดเลือกสาขา -------"||$prefix == ""||$supclass == ""||$std_scheme == "--------โปรดเลือกหลักสูตร---------"){
        echo("<script LANGUAGE='Javascript'>window.alert('กรุณากรอกข้อมูลให้ครบ');
        window.location.href='admin_manageStd.php';</script>");
    }
    else{
        $user_check = "SELECT * FROM user WHERE Username = '$username' LIMIT 1";
        $result = mysqli_query($connect,$user_check);
        $user = mysqli_fetch_assoc($result);
        if($user['Username'] === $username){
                echo ("<script LANGUAGE='Javascript'>window.alert('Username นี่ถูกใช่ไปแล้ว');
                window.location.href='admin_manageStd.php';</script>");
        }else{
            $query1 = "INSERT INTO user (Username, Password, Role) VALUE ('$username','$password','student')";
            $result1 = mysqli_query($connect,$query1);
            $query2 = "INSERT INTO student_detail(User_id,Prefix,Fname,Lname,Faculty,Major,Supclass_std,Student_year,std_scheme) VALUE (LAST_INSERT_ID(),'$prefix','$firstname','$lastname','$faculty','$major','$supclass','$student_year','$std_scheme');";
            $result2 = mysqli_query($connect,$query2);
            if($result1 && $result2){
                echo ("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
                window.location.href='admin_manageStd.php';</script>");
            }
            else{
                echo "เกิดข้อผิดพลาด";
            }
            }
    }



}
?>
<!--พงศกร ขำพิศ-->