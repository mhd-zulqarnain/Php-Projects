<?php

require ("fpdf/fpdf.php");
$con=mysqli_connect('localhost','root','','oss');
$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","",10);
$pdf->Cell(0,10,"Report of Visitors ",1,1,'C');
$pdf->Cell(12,10,"S.NO",0,0,'L');
$pdf->Cell(40,10,"Name",0,0,'L');
$pdf->Cell(40,10,"Mobile",0,0,'L');
$pdf->Cell(40,10,"NIC",0,0,'L');
$pdf->Cell(40,10,"Username",0,0,'L');
$pdf->Cell(40,10,"password",0,1,'L');

$sql="select * from visitor";
$res=$con->query($sql);


while ($row=mysqli_fetch_array($res)){
    $id=$row['vid'];
    $name=$row['name'];
    $ph_number=$row['ph_number'];
    $nic=$row['nic'];
    $user_name=$row['user_name'];
    $password=$row['password'];
    $pdf->Cell(12,10,"{$id}",0,0,'L');
    $pdf->Cell(40,10,"{$name}",0,0,'L');
    $pdf->Cell(40,10,"{$ph_number}",0,0,'L');
    $pdf->Cell(40,10,"{$nic}",0,0,'L');
    $pdf->Cell(40,10,"{$user_name}",0,0,'L');
    $pdf->Cell(40,10,"{$password}",0,1,'L');
}

$pdf->Output();

?>