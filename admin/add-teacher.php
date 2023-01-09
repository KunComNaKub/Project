<?php
require '../connect.php';
if (isset($_POST['submit-add-T'])) {
  $username = $_POST['Tusername'];
  $password = $_POST['Tpassword'];
  $prefix = $_POST['prefix'];
  $firstname = $_POST['fname-T'];
  $lastname = $_POST['Lname-T'];
  $faculty = $_POST['faculty-T'];
  $major = $_POST['major-T'];

  if ($username == '' || $password == '' || $prefix == '' || $firstname == '' || $lastname == '' || $faculty == "------- โปรดเลือกคณะ -------" || $major == '------- โปรดเลือกสาขา -------') {
    echo("<script LANGUAGE='Javascript'>window.alert('กรุณากรอกข้อมูลให้ครบ');
    window.location.href='add-user-teacher.php';</script>");
  } else {
    $user_check = "SELECT * FROM user WHERE Username = '$username' LIMIT 1";
    $result = mysqli_query($connect, $user_check);
    if (!$result) {
      // There was an error executing the query
      echo "There was an error executing the query: " . mysqli_error($connect);
      exit;
    }
    $user = mysqli_fetch_assoc($result);
    if ($user !== null && $user['Username'] === $username) {
      echo("<script LANGUAGE='Javascript'>window.alert('Username นี่ถูกใช่ไปแล้ว');
      window.location.href='add-user-teacher.php';</script>");
    } else {
      $query1 = "INSERT INTO user (Username, Password, Role) VALUE ('$username','$password','teacher')";
      $result1 = mysqli_query($connect, $query1);
      $query2 = "INSERT INTO teacher(User_id,Prefix,Fname,Lname,Faculty,Major) VALUE (LAST_INSERT_ID(),'$prefix','$firstname','$lastname','$faculty','$major');";
      $result2 = mysqli_query($connect, $query2);
      if ($result1 && $result2) {
        echo("<script LANGUAGE='Javascript'>window.alert('สำเร็จ');
        window.location.href='add-user-teacher.php';</script>");
      } else {
        echo "เกิดข้อผิดพลาด";
      }
    }
  }
}
?>