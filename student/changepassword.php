<?php
	session_start();
	require 'checkStd.php';
	require '../connect.php';
	$id = $_SESSION['student_name_login'];
	if(isset($_POST['submit'])){
		$oldpass = $_POST['oldpass'];
		$newpass_1 = $_POST['newpass1'];
		$newpass_2 = $_POST['newpass2'];

		$sql = "SELECT * FROM user WHERE User_id = $id";
		$result = mysqli_query($connect,$sql);
		$row = $result->fetch_assoc();

		if($row['Password'] != $oldpass){
			echo ("<script LANGUAGE='Javascript'>window.alert('รหัสผ่านเดิมไม่ถูกต้อง');
			window.location.href='changepassword.php';</script>");
		}elseif($newpass_1 != $newpass_2){
			echo ("<script LANGUAGE='Javascript'>window.alert('รหัสผ่านไม่ตรงกัน');
                window.location.href='changepassword.php';</script>");
		}else{
			$sql2 = "UPDATE user SET Password = '$newpass_1' WHERE User_id = $id";
			$result2 = mysqli_query($connect,$sql2);
			if($result2){
			echo ("<script LANGUAGE='Javascript'>window.alert('เปลี่ยนรหัสผ่านสำเร็จ');
            window.location.href='stdHome.php';</script>");
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>repassword</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Change Password
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action ="" method = "POST">
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="passwordold" name="oldpass" placeholder="Old Password...">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password1" name="newpass1" placeholder="New Password...">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password2" name="newpass2" placeholder="Confirm Password...">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name = "submit">
							Confirm Password
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
<!-- คเณศ -->
<!-- พงศกร -->