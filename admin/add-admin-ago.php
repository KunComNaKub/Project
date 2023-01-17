<?php
require '../connect.php';
if(isset($_POST['submit-add-A'])){
    $username = $_POST['Ausername'];
    $password = $_POST['Apassword'];
    $prefix = $_POST['prefix'];
    $firstname = $_POST['fname-A'];
    $lastname = $_POST['Lname-A'];

    if($username == "" || $password == "" || $prefix == ""|| $firstname == "" || $lastname == ""){
        echo("<script LANGUAGE='Javascript'>window.alert('กรุณากรอกข้อมูลให้ครบ');
        window.location.href='add-admin.php';</script>");
    }else{
        $user_check = "SELECT * FROM user WHERE Username = '$username' LIMIT 1";
        $result = mysqli_query($connect, $user_check);
        if (!$result) {
            // There was an error executing the query
            echo "There was an error executing the query: " . mysqli_error($connect);
            exit;
          }
    $user =mysqli_fetch_assoc($result);
    if ($user !== null && $user['Username'] === $username) {
        echo("<script LANGUAGE='Javascript'>window.alert('Username นี่ถูกใช่ไปแล้ว');
        window.location.href='add-admin.php';</script>");
      } else {
        $query1 = "INSERT INTO user (Username, Password, Role) VALUE ('$username','$password','admin')";
        $result1 = mysqli_query($connect, $query1);
        $query2 = "INSERT INTO admin_list (User_id,Prefix,Fname,Lname)VALUE(LAST_INSERT_ID(),'$prefix','$firstname','$lastname')";
        $result2 = mysqli_query($connect, $query2);
        if ($result1 && $result2) {
            echo("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
            window.location.href='add-admin.php';</script>");
          } else {
            echo "เกิดข้อผิดพลาด";
          }
        }

    }

}

?>
<!-- พงศกร ขำพิศ -->