<?php

require ("fpdf/fpdf.php");
$con=mysqli_connect('localhost','root','','oss1');
$from=$_POST['date1'];
$to=$_POST['date2'];
$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","",10);
$pdf->Cell(0,10,"Report of transitions   ",1,1,'C');
$pdf->Cell(40, 10, "Showing transition from {$from} to {$to}", 0, 2, 'L');
$pdf->Cell(12,10,"PID",0,0,'L');
$pdf->Cell(40,10,"Product",0,0,'L');
$pdf->Cell(40,10,"Date",0,0,'L');
$pdf->Cell(40,10,"Price",0,1,'L');

//$query = "SELECT visitor.*,date(deals.B_date) FROM visitor inner join deals on deals.vid=visitor.vid";
$query = "Select p.*,d.B_date from productdetails as p INNER  join deals as d on d.pid=p.pid WHERE d.B_date BETWEEN '$from' AND '$to'";
$query1= "Select Sum(p.price) as total from productdetails as p INNER  join deals as d on d.pid=p.pid WHERE d.B_date BETWEEN '$from' AND '$to'";

$res=$con->query($query);

$res1=$con->query($query1);
$tot=mysqli_fetch_assoc($res1);
$total=$tot['total'];
while ($row=mysqli_fetch_array($res)){
    $id=$row['vid'];
    $pname=substr($row['p_name'],0,8).'..';
    $price=$row['price'];
    $date=$row['B_date'];
    $pdf->Cell(12,10,"{$id}",0,0,'L');
    $pdf->Cell(40,10,"{$pname}",0,0,'L');
    $pdf->Cell(40,10,"{$date}",0,0,'L');
//    $pdf->Cell(40,10,"{$ph_number}",0,0,'L');
    $pdf->Cell(40,10,"{$price}",0,1,'L');
}

if(mysqli_num_rows($res)>0) {
    $pdf->Cell(40, 10, "Total transition :{$total}", 0, 2, 'L');
}
else
    $pdf->Cell(40, 10, "No transitions to show", 0, 2, 'L');
$pdf->Output();

?>