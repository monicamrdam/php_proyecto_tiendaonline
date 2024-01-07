<?php
require_once("../config.php");

require('../resources/fpdf/fpdf186/fpdf.php');





class PDF extends FPDF

{
function cargardatos(){
    $name = $_GET['name'];
echo $name;
$surnames = $_GET['surnames'];
echo $surnames;
$email = $_GET['email'];
echo $email;
$phone = $_GET['phone'];
echo $phone;
$country = $_GET['country'];
echo $country;
$province = $_GET['province'];
echo $province;
$municipality = $_GET['municipality'];
echo $municipality;
$fulladdress = $_GET['fulladdress'];
echo $fulladdress;
$postalcode = $_GET['postalcode'];
echo $postalcode;
$item_quantity = $_GET['item_quantity'];
echo $item_quantity;
$item_total = $_GET['item_total'];
echo $item_total;

}


}



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,6,'order_id',1,0,'C',1);
$pdf->Cell(30,6,'order_amount ',1,0,'C',1);
$pdf->Cell(30,6,'order_transaction ',1,0,'C',1);
$pdf->Cell(30,6,'order_status ',1,0,'C',1);
$pdf->Cell(30,6,'order_currency ',1,1,'C',1);






$query = query("SELECT * FROM orders");
confirm($query);

    while ($row = fetch_array($query)) {
        $pdf->Cell(50,6,$row['order_id'],1,0,'C');
        $pdf->Cell(30,6,$row['order_amount'],1,0,'C');
        $pdf->Cell(30,6,$row['order_transaction'],1,0,'C');
        $pdf->Cell(30,6,$row['order_status'],1,0,'C');
        $pdf->Cell(30,6,$row['order_currency'],1,1,'C');

    }

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(30,6,'order_currency ',1,1,'C',1);




$pdf->SetFont('Arial','B',40);
$pdf->Image('../resources/fpdf/fpdf186/compraRealizada.jpg',60, 50, 90, 0,'','http://localhost/ecommerce/ecommerce_v.25/app/thank_you.php');

$pdf->Output();
?>
