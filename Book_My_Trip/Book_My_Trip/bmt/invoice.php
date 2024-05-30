<?php
            include('includes/config.php');
           
           $bkid = intval($_GET['bkid']);
            $sql = "SELECT * from tblinvoice where BookingId=:bkid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':bkid', $bkid, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
        
            
            require('fpdf/fpdf.php');
            if ($query->rowCount() > 0) {
                foreach ($results as $result) {
            $name = $result->PackageName;
            $bdate = $result->BookDate;
            $iid = $result->iid;
            $bid = $result->BookingId;
$fname = $result->FullName;
$email = $result->Email;
$pname = $result->PackageName;
$travel = $result->Mode;
$tprice = $result->Tprice;
$pprice = $result->PackagePrice;
$person = $result->Quntity;
$bill= $result->BillAmount;

// New object created and constructor invoked
$pdf = new FPDF();

// Add new pages. By default no pages available.
$pdf->AddPage();

// Set font format and font-size
$pdf->SetFont('Times', 'B', 20);

// Framed rectangular area
$pdf->Cell(176, 5, 'Book My Trip', 0, 0, 'C');

// Set it new line
$pdf->Ln();

// Set font format and font-size
$pdf->SetFont('Times', 'B', 12);

// Framed rectangular area

$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'BMT ',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'Surat, India, 394101',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,$bdate,0,1);//end of line

$pdf->Cell(130 ,5,'Phone [+12345678]',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,$iid,0,1);//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Booking ID',0,0);
$pdf->Cell(34 ,5,$bid,0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$fname,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$email,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130 ,5,'Description',1,0);
$pdf->Cell(34 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130 ,5,$pname,1,0);

$pdf->Cell(34 ,5,$pprice,1,1,'R');//end of line

$pdf->Cell(130 ,5,$travel,1,0);

$pdf->Cell(34 ,5,$tprice,1,1,'R');//end of line

$pdf->Cell(130 ,5,'Person',1,0);

$pdf->Cell(34 ,5,$person,1,1,'R');//end of line

$pdf->Cell(130 ,5,'',1,0);

$pdf->Cell(34 ,5,'',1,1,'R');//end of line

$pdf->Cell(130 ,5,'Total',1,0);

$pdf->Cell(34 ,5,$bill,1,1,'R');//end of line



// Close document and sent to the browser
$pdf->Output();
                }}
