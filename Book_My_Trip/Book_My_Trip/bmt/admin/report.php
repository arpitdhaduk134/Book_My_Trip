<?Php
include('includes/dbconnection.php');
$sql = "SELECT tblbooking.BookingId as bookid,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,tbltourpackages.PackageName as pckname,tblbooking.PackageId as pid,tblbooking.FromDate as fdate,tblbooking.status as status,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from tblusers join  tblbooking on  tblbooking.UserEmail=tblusers.EmailId join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId";
require('fpdf/fpdf.php');
$pdf = new FPDF(); 
$pdf->AddPage();

$width_cell=array(25,50,35,35,50);
$pdf->SetFont('Arial','B',16);

//Background color of header//
$pdf->SetFillColor(193,229,252);

// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],10,'BookID',1,0,'C',true);
//Second header column//
$pdf->Cell($width_cell[1],10,'Customer Name',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[2],10,'Package Id',1,0,'C',true); 
//Fourth header column//
$pdf->Cell($width_cell[3],10,'Tour Date',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[4],10,'Package Name',1,1,'C',true); 
//// header ends ///////

$pdf->SetFont('Arial','',14);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;

/// each record is one row  ///
foreach ($dbh->query($sql) as $row) {
$pdf->Cell($width_cell[0],10,$row['bookid'],1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['fname'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['pid'],1,0,'C',$fill);
$pdf->Cell($width_cell[3],10,$row['fdate'],1,0,'C',$fill);
$pdf->Cell($width_cell[4],10,$row['pckname'],1,1,'C',$fill);
//to give alternate background fill  color to rows//
$fill = !$fill;
}
/// end of records /// 

$pdf->Output();
?>