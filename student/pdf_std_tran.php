<?php
session_start();
require 'checkStd.php';
require '../connect.php';
require_once('../TCPDF-main/tcpdf.php');
//โซนฐานข้อมูล
$student_id =$_GET['GetID'];
$query1 = "SELECT * FROM student_detail where Student_id =  $student_id ";
$result1 = mysqli_query($connect,$query1);


//โซนวัถุดิบและตกแต่ง
$pdf = new TCPDF('P','mm','A4');
$pdf->SetFont('dejavusans', '', 10);
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

$pdf->AddPage();




if(mysqli_num_rows($result1)>0){
    while($row = mysqli_fetch_assoc($result1)){
        $html .="<h1?>Student Name: ".$row['Fname']."</h1>";
    }
}


//โซนเนื้อหา
$pdf->Image('../picture/download.jpg',3,3,20,30);


$pdf->writeHTML($html, true, false, true, false, '');

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
