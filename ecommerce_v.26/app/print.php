<?php
require_once("../config.php");

require('../resources/fpdf/fpdf186/fpdf.php');

/*
$category_query = query("SELECT * FROM  buyer ");

confirm($category_query);

while ($row = fetch_array($category_query)) {
    if ($row['order_transaction_id'] == $_GET['order_transaction_id']) {
        echo $row['buyer_country'];
    }
}

*/
class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 15);
        //Movernos a la derecha
        $this->Cell(80);
        //Título
        $this->Cell(40, 10, 'Recibo compra', 1, 0, 'C');
        //Salto de línea
        $this->Ln(20);

    }

    //Pie de página
    function Footer()
    {
        //Posición: a 1,5 cm del final
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        //Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }


    function Buyer_table($header)
    {
        //Cabecera
        foreach ($header as $col)
            $this->Cell(48, 7, $col, 1);
        $this->Ln();

        $category_query = query("SELECT * FROM  buyer ");

        confirm($category_query);

        while ($row = fetch_array($category_query)) {
            if ($row['order_transaction_id'] == $_GET['order_transaction_id']) {
            $this->Cell(48, 5, utf8_decode($row['buyer_name']), 1);
             $this->Cell(48, 5, utf8_decode($row['buyer_surnames']), 1);
             $this->Cell(48, 5, utf8_decode($row['buyer_email']), 1);
             $this->Cell(48, 5, utf8_decode($row['buyer_phone']), 1);
             $this->Ln();
            }
        
        }



    }
    function Address_table($header)
    {
        //Cabecera
        foreach ($header as $col)
            $this->Cell(38, 7, $col, 1);
        $this->Ln();
         $category_query = query("SELECT * FROM  buyer ");

        confirm($category_query);

        while ($row = fetch_array($category_query)) {
            if ($row['order_transaction_id'] == $_GET['order_transaction_id']) {
            $this->Cell(38, 5, utf8_decode($row['buyer_country']), 1);
             $this->Cell(38, 5, utf8_decode($row['buyer_province']), 1);
             $this->Cell(38, 5, utf8_decode($row['buyer_municipality']), 1);
             $this->Cell(38, 5, utf8_decode($row['buyer_fulladdress']), 1);
             $this->Cell(38, 5, utf8_decode($row['buyer_postalcode']), 1);
             $this->Ln();
            }
        
        


        }


    }
    function Orders_table($header)
    {
        //Cabecera
        foreach ($header as $col)
            $this->Cell(48, 7, $col, 1);
        $this->Ln();

        $category_query = query("SELECT * FROM orders");
        
        confirm($category_query);

        while ($row = fetch_array($category_query)) {
            if ($row['order_transaction_id'] == $_GET['order_transaction_id']) {
            $this->Cell(48, 5, utf8_decode($row['order_transaction_id']), 1);
             $this->Cell(48, 5, utf8_decode($row['order_quantity']), 1);
             $this->Cell(48, 5, utf8_decode($row['order_amount']), 1);
             $this->Cell(48, 5, utf8_decode($row['order_status']), 1);
             $this->Ln();
            }


        }


    }
}


$pdf = new PDF();
//Títulos de las columnas
$header_buyer = array('Nombre', 'Apellidos', 'Email', 'Telefono');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(40);
$pdf->Buyer_table($header_buyer);

$header_address = array('Ciudad', 'Provincia', 'Municipio', 'Direccion', 'Codigo postal');
$pdf->SetY(60);
$pdf->Address_table($header_address);

$header_orders = array('Id transaccion', 'Cantidad', 'Precio', 'Estado');
$pdf->SetY(80);
$pdf->Orders_table($header_orders);

$pdf->SetFont('Arial', 'B', 40);
$pdf->Image('../resources/fpdf/fpdf186/compraRealizada.jpg', 60, 120, 90, 0, '', 'http://localhost/ecommerce/ecommerce_v.26/app/thank_you.php');

$pdf->Output();

session_destroy();
?>

