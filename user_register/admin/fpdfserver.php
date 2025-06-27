<?php
$db=mysqli_connect('localhost','root','','gav_database');
if(isset($_GET['pdf'])){
    $pdf_id = ($_GET['pdf']);
    $sql = "select * from booking inner join updates_place inner join updates inner join gav_user ON updates_place.place_name = booking.destination AND updates.vehicle_name=booking.vehicle and gav_user.username=booking.username WHERE booking_id ='$pdf_id'";
    $pdf_records=mysqli_query($db, $sql); 
    while($print=mysqli_fetch_assoc($pdf_records)){
        
        
        
        
        
        
    
    
require ("pdf_library/fpdf.php");
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont("Arial","B",11);
$pdf->Cell(0, 15,"CONFIRMED BOOKINGS",1,1,'C');



$pdf->Cell(0, 9,"Name: ".$print['first_name']." ".$print['last_name']."",0,1);
$pdf->Cell(0, 9,"Age: ".$print['age']."",0,1);
$pdf->Cell(0, 9,"Place Address: ".$print['address']."",0,1);
$pdf->Cell(0, 9,"Email: ".$print['email']."",0,1);
$pdf->Cell(0, 9,"Contact Number: ".$print['phone_num']."",0,1);

$pdf->Cell(0, 9,"BOOKING INFORMATION",1,1,'C');
$pdf->Cell(95, 9,"Picking Date: ".$print['pickup_date']."",1,0,'C');
$pdf->Cell(0, 9,"Picking Time: ".$print['pickup_time']."",1,1,'C');
$pdf->Cell(95, 9,"Picking Place: ".$print['picking_place']."",1,0,'C');
$pdf->Cell(0, 9,"Type of Passenger: ".$print['passenger']."",1,1,'C');
$pdf->Cell(95, 9,"Vehicle: ".$print['vehicle_name']."",1,0,'C');
$pdf->Cell(0, 9,"Price: ".$print['vehicle_price']."",1,1,'C');
$pdf->Cell(95, 9,"Destination: ".$print['place_name']."",1,0,'C');
$pdf->Cell(0, 9,"Trip Price: ".$print['place_price']."",1,1,'C');
$pdf->MultiCell(0, 9,"Important Information",0,'C');
$pdf->MultiCell(190, 5,"".$print['other']."",0,'J');
$pdf->Cell(0, 30,"",0,1);

$pdf->Cell(0, 9,"Payments",1,1,'C');
$pdf->Cell(95, 9,"Vehicle:",0,0,'C');
$pdf->Cell(0, 9,"".$print['vehicle_price']."",0,1,'C');
$pdf->Cell(95, 9,"Destination: ",0,0,'C');
$pdf->Cell(0, 9,"".$print['place_price']."",0,1,'C');
$pdf->Cell(95, 9,"Total:",1,0,'C');
$pdf->Cell(0, 9,"".$print['vehicle_price'] + $print['place_price']."",1,1,'C');
$pdf->Cell(0, 20,"",0,1);
$pdf->Cell(0, 9,"________________________",0,1,'C');
$pdf->Cell(0, 9,"Company Manager Approval",0,1,'C');
$pdf->Cell(0, 20,"",0,1);
$pdf->Cell(0, 9,"________________________",0,1,'C');
$pdf->Cell(0, 9,"Passenger Signature",0,1,'C');
$pdf->output();
}
}
?>
