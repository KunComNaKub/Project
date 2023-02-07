<?php
    session_start();
    require 'checkAdmin.php';
    require '../connect.php';
    $course_id = $_GET['GetID'];
    $query = "SELECT * FROM subject Where Subject_id = '".$course_id."'";
    $result = mysqli_query($connect,$query);
    
    while($row=mysqli_fetch_assoc($result))
    {
        $Subject_id = $row['Subject_id'];
        $Course_code = $row['Course_code'];
        $Name_sub = $row['Name_sub'];
        $Group_Category = $row['Group_Category'];
        $Group_sub = $row['Group_sub'];
        $Faculty = $row['Faculty'];
        $Group_course = $row['Group_course'];
        $Sub_Year = $row['Sub_Year'];
        $Credit = $row['Credit'];
        $Sj_scheme =$row['subject_scheme'];
        $Sj_descrip = $row['Sub_descrip'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='styleadmin.css'>
    <title>Document</title>
</head>
<body>
    <div class="container-update">
    <form class="form" action="update_sub.php?ID=<?php echo $Subject_id ?>" method="post">
        <h2>อัพเดต/แก้ไข</h2>
        <div class="form-element-sub">
            <label for="sub-faculty">คณะ</label>
            <select name="sub-faculty" >
                <option class="plz-select-choice">------- โปรดเลือกคณะ -------</option>
                <option value="บริหารธุรกิจ" <?php if($Faculty == 'บริหารธุรกิจ'){echo "selected";}?>>บริหารธุระกิจและเทคโนโลยีสารสนเทศ</option>
                <option value="ศิลปะศาสตร์" <?php if($Faculty == 'ศิลปะศาสตร์'){echo "selected";}?>>ศิลปะศาสตร์</option>
            </select>
        </div>
        <div class="form-element-sub">
            <label for="sub-catagorie">กลุ่มรายวิชา</label>
            <select class="sub-catagorie" name="sub-catagorie">
                <option class="plz-select-chioce">------- โปรดเลือกกลุ่มวิชา -------</option>
                <option value="กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์" <?php if($Group_Category == 'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์'){echo "selected";}?>>กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์</option>
                <option value="กลุ่มภาษา" <?php if($Group_Category == 'กลุ่มภาษา'){echo "selected";}?>>กลุ่มภาษา</option>
                <option value="กลุ่มวิทยาศาสตร์และคณิตศาสตร์" <?php if($Group_Category == 'กลุ่มวิทยาศาสตร์และคณิตศาสตร์'){echo "selected";}?>>กลุ่มวิทยาศาสตร์และคณิตศาสตร์</option>
                <option value="กลุ่มบูรณาการ" <?php if($Group_Category == 'กลุ่มบูรณาการ'){echo "selected";}?>>กลุ่มบูรณาการ</option>
                <option value="กลุ่มวิชาแกน" <?php if($Group_Category == 'กลุ่มวิชาแกน'){echo "selected";}?>>กลุ่มวิชาแกน</option>
                <option value="กลุ่มวิชาฝึกงานและประสบการณ์" <?php if($Group_Category == 'กลุ่มวิชาฝึกงานและประสบการณ์'){echo "selected";}?>>กลุ่มวิชาฝึกงานและประสบการณ์</option>
                <option value="เลือกเสรี" <?php if($Group_Category == 'เลือกเสรี'){echo "selected";}?>>เลือกเสรี</option>
            </select>
        </div>
        <div class="form-element-sub">
            <label for="group-course">หมวดวิชา</label>
            <select name="group-course">
                <option class="plz-select-choice">------ โปรดเลือกหมวดวิชา -------</option>
                <option value="ศึกษาทั่วไป-บังคับ" <?php if($Group_course == 'ศึกษาทั่วไป-บังคับ'){echo "selected";}?>>ศึกษาทั่วไป-บังคับ</option>
                <option value="ศึกษาทั่วไป-เลือก" <?php if($Group_course == 'ศึกษาทั่วไป-เลือก'){echo "selected";}?>>ศึกษาทั่วไป-เลือก</option>
                <option value="เฉพาะ-แกน" <?php if($Group_course == 'เฉพาะ-แกน'){echo "selected";}?>>เฉพาะ-แกน</option>
                <option value="เฉพาะ-เลือก" <?php if($Group_course == 'เฉพาะ-เลือก'){echo "selected";}?>>เฉพาะ-เลือก</option>
                <option value="เลือกเสรี" <?php if($Group_course == 'เลือกเสรี'){echo "selected";}?>>เลือกเสรี</option>
            </select>
        </div>
        <div class="form-element-sub">
            <label for="group-sub">กลุ่ม</label>
            <select class="group-sub" name="group-sub">
                <option class="plz-select-choice">------- โปรดเลือกกลุ่ม -------</option>
            </select>
        </div>
        <div class="form-element-sub">
            <label for="sub-coursecode">รหัสวิชา</label>
            <input type="text" id="sub-coursecode" name="course-code" value ="<?php echo $Course_code ?>">
        </div>
        <div class="form-element-sub">
            <label for="name-sub">ชื่อวิชา</label>
            <input type="text" id="name-sub" name="name-sub" value="<?php echo $Name_sub ?>">
        </div>
        <div class="form-element-sub">
            <label for="credit-sub">หน่วยกิต</label>
            <input type="text" id="credit-sub" name="credit-sub" value ="<?php echo $Credit ?>">
        </div>
        <div class="form-element-sub">
            <label for="course-year">ปีการศึกษา</label>
            <input type="text" id="course-year" name="course-year" value = "<?php echo $Sub_Year ?>">
        </div>
        <div class="form-element-sub">
            <label for="subject-scheme">หลักสูตร</label>
            <select name ="sj_scheme">
                <option class="plz-select-choice">--------โปรดเลือกหลักสูตร---------</option>
                <option value="ปริญญาตรี" <?php if($Sj_scheme == 'ปริญญาตรี'){echo "selected";} ?>>ปริญญาตรี</option>
                <option value="ปวส"<?php if($Sj_scheme == 'ปวส'){echo "selected";} ?>>ปวส</option>
            </select>
        </div>
        <div class="form-element-sub">
            <label for="subject-discription">คำอธิบายรายวิชา</label>
            <input type="text" id="sj_discription" name="sj_discription" value="<?php echo $Sj_descrip ?>">
        </div>
        <div class="form-element-sub">
            <input type="submit" name="btn-update-sub" value="ยืนยันอัพเดต" class="confirm-add">
            <input type="submit" name="btn-delete-sub" value="ลบรายวิชานี้" class="confirm-delete">
        </div>
    </form>
</div>
<script src="edit_sub.js"></script>

<script type= "text/javascript">
    var option;
    option ="<?php print($Group_sub);?>"
    console.log(option);
    $test = document.querySelector(".group-sub");

if(b == "กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์" ){
    $test.length = 1;
    const opt1 = document.createElement("option");
    opt1.value = "รายวิชาบังคับ" ;
    opt1.classList = "1"
    opt1.text = "รายวิชาบังคับ";

    const opt2 = document.createElement("option");
    opt2.value = "รายวิชาสังคมศาสตร์";
    opt2.classList = "1"
    opt2.text = "รายวิชาสังคมศาสตร์";

    const opt3 = document.createElement("option");
    opt3.value = "รายวิชามนุษศาสตร์";
    opt3.classList = "1"
    opt3.text = "รายวิชามนุษศาสตร์";

    $test.add(opt1, null);
    $test.add(opt2, null);
    $test.add(opt3, null);
}
else if(b == "กลุ่มภาษา"){
    $test.length = 1;
    const opt4 = document.createElement("option");
    opt4.value = "รายวิชาบังคับ";
    opt4.classList = "2"
    opt4.text = "รายวิชาบังคับ";

    const opt5 = document.createElement("option");
    opt5.value = "รายวิชาภาษาไทย";
    opt5.classList = "2"
    opt5.text = "รายวิชาภาษาไทย";

    const opt6 = document.createElement("option");
    opt6.value = "รายวิชาภาษาอังกฤษ";
    opt6.classList = "2"
    opt6.text = "รายวิชาภาษาอังกฤษ";

    const opt7 = document.createElement("option");
    opt7.value = "รายวิชาภาษาต่างประเทศอื่น";
    opt7.classList = "2"
    opt7.text = "รายวิชาภาษาต่างประเทศอื่น";
    $test.add(opt4, null);
    $test.add(opt5, null);
    $test.add(opt6, null);
    $test.add(opt7, null);
}
else if(b == "กลุ่มวิทยาศาสตร์และคณิตศาสตร์"){
    $test.length = 1;
    const opt8 = document.createElement("option");
    opt8.value = "รายวิชาบังคับ";
    opt8.classList = "3"
    opt8.text = "รายวิชาบังคับ";

    const opt9 = document.createElement("option");
    opt9.value = "รายวิชาคณิตศาสตร์";
    opt9.classList = "3"
    opt9.text = "รายวิชาคณิตศาสตร์";

    const opt10 = document.createElement("option");
    opt10.value = "รายวิชาวิทยาศาสตร์";
    opt10.classList = "3"
    opt10.text = "รายวิชาวิทยาศาสตร์";

    $test.add(opt8, null);
    $test.add(opt9, null);
    $test.add(opt10, null);
}
else if(b == "กลุ่มบูรณาการ"){
    $test.length = 1;
    const opt11 = document.createElement("option");
    opt11.value = "รายวิชาบังคับ";
    opt11.classList = "4"
    opt11.text = "รายวิชาบังคับ";

    const opt12 = document.createElement("option");
    opt12.value = " รายวิชาบูรณาการ";
    opt12.classList = "4"
    opt12.text = " รายวิชาบูรณาการ";

    $test.add(opt11, null);
    $test.add(opt12, null);
}
else if(b == "กลุ่มวิชาแกน"){
    $test.length = 1;
    const opt13 = document.createElement("option");
    opt13.value = "วิชาแกน";
    opt13.classList = "5"
    opt13.text = "วิชาแกน";

    const opt14 = document.createElement("option");
    opt14.value = "วิชาเฉพาะด้าน";
    opt14.classList = "5"
    opt14.text = "วิชาเฉพาะด้าน";

    const opt15 = document.createElement("option");
    opt15.value = "วิชาเลือก";
    opt15.classList = "5"
    opt15.text = "วิชาเลือก";

    $test.add(opt13, null);
    $test.add(opt14, null);
    $test.add(opt15, null);
}
else if(b == "กลุ่มวิชาฝึกงานและประสบการณ์"){
    $test.length = 1;
    const opt16 = document.createElement("option");
    opt16.value = "แผนฝึกงาน";
    opt16.classList = "6"
    opt16.text = "แผนฝึกงาน";
    
    const opt17 = document.createElement("option");
    opt17.value = "แผนสหกิจศึกษา" ;
    opt17.classList = "6"
    opt17.text = "แผนสหกิจศึกษา";

    const opt18 = document.createElement("option");
    opt18.value = "แผนเรียนรู้ร่วมกับการทำงาน";
    opt18.classList = "6"
    opt18.text = "แผนเรียนรู้ร่วมกับการทำงาน";

    $test.add(opt16, null);
    $test.add(opt17, null);
    $test.add(opt18, null);
}
else if(b== "เลือกเสรี"){
    $test.length = 1;
    const opt19 = document.createElement("option");
    opt19.value = "เลือกเสรี";
    opt19.classList = "7";
    opt19.text = "เลือกเสรี";
    $test.add(opt19,null);
}
else{
    $test.length =1;
}
for(i = 0 ;i <$test.length;i++){
    if(option == $test[i].value){
        $test[i].selected = "true";
    }
}
</script>


</body>
</html>




<!--พงศกร-->