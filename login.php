<?php
    session_start();
    require 'connect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    
    if(isset($_POST['btn_login'])&& $username && $password){

        $query = "SELECT * FROM project.user WHERE Username='$username' AND Password ='$password'";
        $result = mysqli_query($connect,$query);

        if(mysqli_num_rows($result)==1){
            
            $row = mysqli_fetch_array($result);

            $id = $row['User_id'];
            $role = $row['Role'];

            switch($role){
                
                case "admin":
                    $_SESSION['admin_name_login'] = $id;
                    Header('Location: admin/admin_home.php');
                    break;
                case "student":
                    $_SESSION['student_name_login'] = $id;
                    Header('Location: index.html');
                    break;
                default:
                    echo"<script>alert('สถานะถูกแก้ไข');</script>";
                    Header('Location: login_form.html');
                    break;
            }


        }
        else{
            echo "<scripts>alert('ชื่อผู้ใช่งานผิด');</scripts>";
            header('Refresh:0;url=index.html');
        }
    }
    else{
        header('location:index.html');
    }
?>
<!--พงศกร ขำพิศ-->