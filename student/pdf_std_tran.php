<?php
session_start();
require '../connect.php';
require_once('../TCPDF-main/tcpdf.php');
//โซนฐานข้อมูล
$student_id =$_GET['GetID'];


$query1 = "SELECT * FROM student_detail where Student_id =  $student_id ";
$result1 = mysqli_query($connect,$query1);
$row = $result1->fetch_assoc();
$id = $row['User_id'];
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
$query4 = "SELECT * FROM transfer_std INNER JOIN subject ON transfer_std.Subjecttrans_id = subject.Subject_id WHERE transfer_std.Student_id = $student_id GROUP BY subject.Group_Category";
$result4 = mysqli_query($connect,$query4);
while ($row4 = mysqli_fetch_array($result4)){
    $group_category[$row4['Group_Category']][]=$row4;
}
$i = 0;
foreach ($group_category as $key => $value){
    $group_num[$i] = $key;
    $i++;
}

$query_con = "SELECT * FROM detail_confirm_tran WHERE Student_id = $student_id";
$resultcon = mysqli_query($connect,$query_con);
$rowcon = $resultcon->fetch_assoc();

if($rowcon['name_3'] == ""){
    $rowcon['name_3'] = "............";
}
if($rowcon['name_4'] == ""){
    $rowcon['name_4'] = "............";
}
if($rowcon['name_5'] == ""){
    $rowcon['name_5'] = "............";
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
                padding:200px;
            }
          </style>';
          
        $html .= ''.$Group.'<br>';
        $html .=    '<table>
                        <tr>
                            <td style="width:57px"> กลุ่มวิชา</td>
                            <td style="width:58px"> หมวดวิชา</td>
                            <td style="width:40px"> รหัสวิชา</td>
                            <td style="width:100px"> รายวิชาปริญาตรี มทร.ตะวันออก</td>
                            <td style="width:30px"> หน่วยกิต</td>
                            <td style="width:40px"> รหัสวิชา</td>
                            <td style="width:100px"> รายวิชาประกาศนียบัตร วิชาชีพชั้นสูง</td>
                            <td style="width:28px"> หน่วยกิต</td>
                            <td style="width:18px"> เกรด</td>
                            <td style="width:35px"> ผลพิจารณา</td>
                            <td style="width:45px"> หมายเหตุ </td>
                        </tr>
                    ';
        while ($row = mysqli_fetch_assoc($result3)){
            
            $html.='    <tr>
                            <td>'.$row['Group_sub'].'</td>
                            <td>'.$row['Group_course'].'</td>
                            <td>'.$row['Course_code'].'</td>
                            <td>'.$row['Name_sub'].'</td>
                            <td>'.$row['Credit'].'</td>
                            <td>'.$row['Subject_idtran'].'</td>
                            <td>'.$row['Subject_nametran'].'</td>
                            <td>'.$row['Credit_tran'].'</td>
                            <td>'.$row['Gpa_tran'].'</td>
                            <td>'.$row['Teacher_pass'].'</td>
                            <td>'.$row['remark'].'</td>
                        </tr>';
        }
    }
    $html .= '</table>';
    $pdf->writeHTML($html,false,false,true,false,'');
    $pdf->ln(1.25);
}

$pdf->AddPage();


//โซนเนื้อหา
$pdf->Image('../picture/download.jpg',5,3,18,30);
$pdf->ln(10);
$pdf->SetFont('thsarabun', '', 8);
$pdf->Cell(14,0,'',0,0);
$pdf->MultiCell(34,0,'มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออกคณะบริหารธุรกิจและเทคโนโลยีสารสนเทศ',0,'J',0,0);
$pdf->SetFont('thsarabun', '', 18);
$pdf->Cell(95,10,'แบบเทียบโอนผลการเรียนรายวิชา  (รายบุคคล)',0,1,'C');
$pdf->ln(2);
$pdf->SetFont('thsarabun', '', 14);
$pdf->Cell(200,1,'แนวทางการเทียบโอนของนักศึกษาหลักสูตรปริญญาตรี  4  ปี ประจำปีการศึกษา '.$row['Student_year'].' สาขาวิชา '.$row['Major'].'',0,1,'C');
$pdf->SetFont('thsarabun', '', 14);
$pdf->Cell(200,1,'ข้าพเจ้า '.$row['Prefix'].' '.$row['Fname'].'  '.$row['Lname'].' รหัสประจำตัวนักศึกษา '.$row2['Username'].' สาขาวิชา '.$row['Major'].' ภาค '.$row['Supclass_std'].' ',0,1,'C');
$pdf->Cell(200,1,'หมายเลขโทรศัพท์ '.$row['Phone_std'].' อีเมล '.$row['Email_std'].' มีความประสงค์จะขอเทียบโอนรายวิชา ดังนี้',0,1,'C');
$pdf->ln(3);
$pdf->SetFont('thsarabun', '', 14);


for($i = 0; $i < count($group_num);$i++){
    std_tran($pdf,$student_id,$group_num[$i],$connect);
}
//หน้าอาจารย์ลงนาม
$pdf->AddPage('L', 'A4');
$pdf->Image('../picture/download.jpg',5,3,18,30);
$pdf->ln(10);
$pdf->SetFont('thsarabun', '', 10);
$pdf->Cell(14,0,'',0,0);
$pdf->MultiCell(42,0,'มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออกคณะบริหารธุรกิจและเทคโนโลยีสารสนเทศ',0,'J',0,1);
$pdf->SetFont('thsarabun', '', 18);
$pdf->Cell(280,10,'การตรวจสอบเอกสารเทียบโอนผลการเรียนของนักศึกษา สาขาวิชา'.$row['Major'].'  ประจำปีการศึกษา '.$row['Student_year'].' คณะ'.$row['Faculty'].'',0,1,'C');

$pdf->SetFont('thsarabun', '', 16);

$pdf->MultiCell(80,0,'
(ลงชื่อ).......................................นักศึกษา
('.$row['Prefix'].' '.$row['Fname'].'  '.$row['Lname'].')
'. date("Y/m/d") .'
    ',1,'C',0,0);

$pdf->MultiCell(80,0,'
(ลงชื่อ).......................................อาจารย์ที่ปรึกษา
(.......'.$rowcon['name_advisor'].'.......)
'. date("Y/m/d") .'
    ',1,'C',0,0);

$pdf->MultiCell(80,0,'
(ลงชื่อ).......................................หัวหน้าสาขา
(.......'.$rowcon['name_chief'].'.......)
'. date("Y/m/d") .'
    ',1,'C',0,1);
$count = "SELECT COUNT(Student_id)as count1 FROM transfer_std WHERE Student_id = $student_id";
$resultcount = mysqli_query($connect,$count);
$rowcount = $resultcount->fetch_assoc();

$sumCre = "SELECT SUM(subject.Credit) as SumCredit FROM transfer_std INNER JOIN subject on transfer_std.Subjecttrans_id = subject.Subject_id  WHERE transfer_std.Student_id = $student_id";
$resultsum = mysqli_query($connect,$sumCre);
$rowsum = $resultsum->fetch_assoc();

$pdf->MultiCell(160,0,'ผลการเทียบโอนที่เทียบได้ จำนวน........'.$rowcount['count1'].'.........รายวิชา       รวม......'.$rowsum['SumCredit'].'......หน่วยกิต
เอกสารที่แนบมาพร้อมนี้  1.ใบแสดงผลการศึกษา        จำนวน.....1.....ชุด
2.ใบผลการทดสอบทางการศึกษาระดับชาติ (V-Net)     จำนวน.............ชุด
3.แบบเทียบโอนผลการเรียนรายวิชา (รายบุคคล)          จำนวน.....1.....ชุด',1,'C',0,0);

$pdf->MultiCell(80,0,'ผลการตรวจเอกสาร

ให้หัวหน้าสาขาเป็นผู้ดำเนินการตรวจสอบเอกสาร
    ',1,'C',0,1);

$pdf->MultiCell(80,0,'
(ลงชื่อ).........................................ประธานกรรมการ
(.......'.$rowcon['name_president'].'.......)

(ลงชื่อ).................................................กรรมการ
(.......'.$rowcon['name_1'].'.......)',1,'C',0,0);
$pdf->MultiCell(80,0,'
(ลงชื่อ).................................................กรรมการ
(.......'.$rowcon['name_2'].'.......)

(ลงชื่อ).................................................กรรมการ
(........'.$rowcon['name_3'].'......)',1,'C',0,0);
$pdf->MultiCell(80,0,'
(ลงชื่อ).................................................กรรมการ
(.......'.$rowcon['name_4'].'.......)

(ลงชื่อ).................................................กรรมการ
(.......'.$rowcon['name_5'].'.......)',1,'C',0,1);
$pdf->MultiCell(240,0,'รับทราบผลการเทียบโอน ลงชื่อ.............................................................นักศึกษา         ลงชื่อ..................................................................อาจารย์ที่ปรึกษา',1,'C',0,1);

$pdf->MultiCell(240,0,'หมายเหตุ : ให้อาจารย์ที่ปรึกษานำผลพิจารณานี้ กรอกแบบรายงานผลการเทียบโอนผลการเรียน เสนอคณบดีเพื่ออนุมัติ',1,'C',0,1);




$file_name = "transfer ".$row['Prefix']."".$row['Fname'].' '.$row['Lname'].''.$row2['Username'].".pdf";
ob_end_clean();
if($_GET['ACTION']=='VIEW')
{
    $pdf ->Output($file_name,'I');
}
if($_GET['ACTION']=='DOWNLOAD'){
    $pdf->Output($file_name, 'D');
}


?>
<!-- พงศกร -->