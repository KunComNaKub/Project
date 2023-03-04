<?php
session_start();
require 'checkTeacher.php';
require '../connect.php';


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='styleteacher.css'>   
    </head>
    <body>
    <header class="header">
        <img src="../picture/มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก.png" class="logo">
        </header>
        <div class="container">
            <nav class="sidebar">
                <div class="menu-bar">
                    <div class="menu">
                        <ul class="menu-links">
                            <li class="link">
                                <a href ="teacher-home.php">
                                    <span class="text nav-text">หน้าหลัก TEACHER</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="change_password.php">
                                    <span class="text nav-text">เปลี่ยนรหัส Password</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="T-estimate-std.php">
                                    <span class="text nav-text">ประเมินพิจารณา นศ.</span>
                                </a>
                            </li>
                            <li class="link">
                                <a href ="logout.php">
                                    <span class="text nav-text">ออกจากระบบ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="home">
                <div class= "container-box">
                    <span>นักเรียนที่รอพิจารณา</span>
                    <div class ="search-name">
                    </div>

                    <form action ="" class = "box-transfer-std" method = "POST">
                        <?php
                            function displaytable($TSfaculty,$TSmajor,$connect){
                                $sql = "SELECT * FROM `student_detail` WHERE std_confirm_tran = 1 AND Faculty = '$TSfaculty' AND Major = '$TSmajor'";
                                $result = $connect->query($sql);
                                if($result){
                                    ?>
                                    <div class = "box-estimate">
                                        <h3><?php echo $TSfaculty;echo "&nbsp;&nbsp;" ; echo $TSmajor; ?></h3> 
                                        <div class="box-estimate2">
                                            <table>
                                                <tr>
                                                    <td>ชื่อ</td>
                                                    <td>คณะ</td>
                                                    <td>สาขา</td>
                                                    <td>ภาค</td>
                                                    <td>ปีการศึกษา</td>
                                                    <td>พิจารณาผล</td>                                 
                                                </tr>
                                                <?php
                                                while ($row = $result ->fetch_assoc()):
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['Prefix']; echo "&nbsp&nbsp" ; echo $row['Fname'] ;echo "&nbsp&nbsp" ; echo $row['Lname'];?></td>
                                                    <td><?php echo $row['Faculty'];?></td>
                                                    <td><?php echo $row['Major'];?></td>
                                                    <td><?php echo $row['Supclass_std'];?></td>
                                                    <td><?php echo $row['Student_year'];?></td>
                                                    <td><a class = "btn-estimate" href = "estimate-std.php?GetID=<?php echo $row['Student_id']; ?>" >พิจารณาผล</td>
                        </form> 
                                                        
                                                    <?php endwhile ?>
                                                </tr>
                                            </table>
                                        </div>
                                        
                                    </div>
                                    <hr style="width:100%;text-align:left;margin-left:0;margin-top:10px;color:black;height:3px;background-color:black">
                                    <?php
                                } else{
                                    echo "ERROR: " . $connect->error;
                                }
                            }
            
                            displaytable('บริหารธุรกิจและเทคโนโลยีสารสนเทศ','วิทยาการสารสนเทศ',$connect);
                            displaytable('บริหารธุรกิจและเทคโนโลยีสารสนเทศ','การตลาด',$connect);
                            displaytable('บริหารธุรกิจและเทคโนโลยีสารสนเทศ','บัญชี',$connect);
                            displaytable('ศิลปะศาสตร์','วิทยาการสารสนเทศ',$connect);
                            displaytable('ศิลปะศาสตร์','การตลาด',$connect);
                            displaytable('ศิลปะศาสตร์','บัญชี',$connect);
     
                        ?>
                    </form>
                </div>
            </section>
        </div>
    </body>
</html>
<!-- พงศกร ขำพิศ -->