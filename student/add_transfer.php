<?php
session_start();
require 'checkStd.php';
require '../connect.php';
$Subject_id = $_GET['GetID'];
$sql = "SELECT * FROM subject,transfer_std WHERE subject.Subject_id = $Subject_id ";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='styletrans.css'>
    <title>Document</title>
</head>
<body>

<div class = "container">
    <form action ="update_transfer.php">
       <div>
        <h1>เทียบโอนวิชา</h1>
       </div>
       <div>
        <span>หมวดวิชา :<?php echo $row['Group_course']?></span>
        </div>
        <div>
            <span>รหัสวิชา :<?php echo $row['Course_code']?></span>
        </div>
        <div>
            <span>รายวิชาปริญาตรี มทร.ตะวันออก :<?php echo $row['Course_code']?></span>
        </div>
        <div>
            <span>หน่วยกิต :<?php echo $row['Credit']?></span>
        </div>

        <div>
            <label>รหัสวิชา :</label>
            <input type="text" name="Subject_idtran">
        </div>
        <div>
            <label>รายวิชาประกาศนียบัตรวิชาชีพชั้นสูง :</label>
            <input type="text" name="Subject_nametran">
        </div>
        <div>
            <label>หน่วยกิต :</label>
            <input type="text" name="Credit_tran">
        </div>
        <div>
            <label>เกรด :</label>   
            <input type="text" name="Gpa_tran">
        </div>
        <div>
            <input type="submit" name="btn-add-transfer" value="ยืนยันอัพเดต" class="confirm-add">
        </div>

    </form>
</div>

</body>
</html>

<!-- พงศกร ขำพิศ-->