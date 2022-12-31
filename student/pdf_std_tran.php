<?php
session_start();
require 'checkStd.php';
require '../connect.php';
require_once('../TCPDF-main/tcpdf.php');
//โซนฐานข้อมูล
$student_id =$_GET['GetID'];
$id = $_SESSION['student_name_login'];

$query1 = "SELECT * FROM student_detail where Student_id =  $student_id ";
$result1 = mysqli_query($connect,$query1);
$row = $result1->fetch_assoc();

if($row['Email_std'] ==''){
    $row['Email_std'] = '_______________________';
}
if($row['Phone_std']==''){
    $row['Phone_std'] = '_______________';
}


$query2 = "SELECT * FROM user where User_id = $id";
$result2 = mysqli_query($connect,$query2);
$row2 = $result2->fetch_assoc();

$query3 = "SELECT * FROM transfer_std INNER JOIN subject ON transfer_std.Subjecttrans_id = subject.Subject_id WHERE transfer_std.Student_id = $student_id";
$result3 = mysqli_query($connect,$query3);
$row3 = $result3->fetch_assoc();

$group_category = [];
$query4 = "SELECT * FROM transfer_std INNER JOIN subject ON transfer_std.Subjecttrans_id = subject.Subject_id WHERE transfer_std.Student_id = 5 GROUP BY subject.Group_Category";
$result4 = mysqli_query($connect,$query4);
while ($row4 = mysqli_fetch_array($result4)){
    $group_category[$row4['Group_Category']][]=$row4;
}
$i = 0;
foreach ($group_category as $key => $value){
    $group_num[$i] = $key;
    $i++;
}



//โซนวัถุดิบและตกแต่ง
$pdf = new TCPDF('P','mm','A4');

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);


function std_tran($pdf,$Student_id,$Group,$connect){
    $query3 = "SELECT * FROM transfer_std INNER JOIN subject ON transfer_std.Subjecttrans_id = subject.Subject_id WHERE transfer_std.Student_id = $Student_id AND subject.Group_Category = '$Group'";
    $result3 = mysqli_query($connect,$query3);
    if($result3){
        $html = '<style>
            td {
                border: 1px solid black;
                text-align: center;
                font-size:10px;
                
            }
          </style>';
        $html .= ''.$Group.'<br>
                    <table>
                        <tr>
                            <td style="width:55px"> กลุ่มวิชา</td>
                            <td style="width:60px"> หมวดวิชา</td>
                            <td style="width:40px"> รหัสวิชา</td>
                            <td style="width:110px"> รายวิชาปริญาตรี มทร.ตะวันออก</td>
                            <td style="width:30px"> หน่วยกิต</td>
                            <td style="width:40px"> รหัสวิชา</td>
                            <td style="width:110px"> รายวิชาประกาศนียบัตร วิชาชีพชั้นสูง</td>
                            <td style="width:30px"> หน่วยกิต</td>
                            <td style="width:20px"> เกรด</td>
                            <td style="width:35px"> ผลพิจารณา</td>
                        </tr>
                    </table>';
    }
    $pdf->writeHTML($html);
}

$pdf->AddPage();








//โซนเนื้อหา
$pdf->Image('../picture/download.jpg',5,3,20,30);
$pdf->ln(5);
$pdf->SetFont('thsarabun', '', 18);
$pdf->Cell(200,10,'แบบเทียบโอนผลการเรียนรายวิชา  (รายบุคคล)',0,1,'C');
$pdf->ln(2);
$pdf->SetFont('thsarabun', '', 14);
$pdf->Cell(200,1,'แนวทางการเทียบโอนของนักศึกษาหลักสูตรปริญญาตรี  4  ปี ประจำปีการศึกษา '.$row['Student_year'].' สาขาวิชา ระบบสารสนเทศทางธุรกิจ',0,1,'C');
$pdf->SetFont('thsarabun', '', 14);
$pdf->Cell(200,1,'ข้าพเจ้า '.$row['Prefix'].' '.$row['Fname'].'  '.$row['Lname'].' รหัสประจำตัวนักศึกษา '.$row2['Username'].' สาขาวิชา '.$row['Major'].' ภาค '.$row['Supclass_std'].' ',0,1,'C');
$pdf->Cell(200,1,'หมายเลขโทรศัพท์ '.$row['Phone_std'].' อีเมล '.$row['Email_std'].' มีความประสงค์จะขอเทียบโอนรายวิชา ดังนี้',0,1,'C');

$pdf->SetFont('thsarabun', '', 14);
std_tran($pdf,$student_id,'กลุ่มสังคมศาสตร์และมนุษย์ศาสตร์',$connect);



$file_name = "tran".$student_id.".pdf";
ob_end_clean();
if($_GET['ACTION']=='VIEW')
{
    $pdf ->Output($file_name,'I');
}
if($_GET['ACTION']=='DOWNLOAD'){
    $pdf->Output($file_name, 'D');
}


?>
