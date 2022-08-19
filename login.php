<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    

    $con = new mysqli("localhost","root","root","project");
    if($con->connect_error){
        die("Failed to connect :".$con->connect_error);
    }else{
        $stmt = $con->prepare("select * from user where Username = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data["Password"]===$password){
                echo "<h2>Login Success</h2>";
            }
            else{
                echo"invalid";
            }
        } else {
            echo "<h2>Invalid</h2>";
        }
    }
?>