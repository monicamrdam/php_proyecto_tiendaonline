<?php
require_once("../config.php");

require('../resources/fpdf/fpdf186/fpdf.php');

//https://desarrolloweb.com/articulos/tablas-fpdf.html

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 15);
        //Movernos a la derecha
        $this->Cell(80);
        //Título
        $this->Cell(60, 10, 'Recibo compra', 1, 0, 'C');
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
            $this->Cell(40, 7, $col, 1);
        $this->Ln();
        $order_transaction_id = $_GET['order_transaction_id'];
        echo  $order_transaction_id;

        $category_query = query("SELECT * FROM buyer WHERE order_transaction_id =  $order_transaction_id");
        confirm($category_query);
        while ($category_row = fetch_array($category_query)) {
            $this->Cell(40, 5, $category_row['buyer_name'], 1);

        }




        $query = query("SELECT * FROM buyer WHERE order_transaction_id = " . escape_string($_GET['order_transaction_id']) . " ");
        confirm($query);

        /* while ($row = fetch_array($query)) {
             //$this->Cell(40, 5, $row['buyer_name'], 1);
             $this->Cell(40, 5, "buyer_surnames", 1);
             $this->Cell(40, 5, "buyer_email", 1);
             $this->Cell(40, 5, "buyer_email", 1);
             $this->Ln();



         }
 */

    }
    function Address_table($header)
    {
        //Cabecera
        foreach ($header as $col)
            $this->Cell(40, 7, $col, 1);
        $this->Ln();
        $query = query("SELECT * FROM buyer");
        confirm($query);

        while ($row = fetch_array($query)) {
            $this->Cell(40, 5, $row['buyer_name'], 1);
            $this->Cell(40, 5, "buyer_surnames", 1);
            $this->Cell(40, 5, "buyer_email", 1);
            $this->Cell(40, 5, "buyer_email", 1);
            $this->Ln();



        }


    }
    function Orders_table($header)
    {
        //Cabecera
        foreach ($header as $col)
            $this->Cell(40, 7, $col, 1);
        $this->Ln();
        $query = query("SELECT * FROM buyer");
        confirm($query);

        while ($row = fetch_array($query)) {
            $this->Cell(40, 5, $row['buyer_name'], 1);
            $this->Cell(40, 5, "buyer_surnames", 1);
            $this->Cell(40, 5, "buyer_email", 1);
            $this->Cell(40, 5, "buyer_email", 1);
            $this->Ln();



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

$header_orders = array('Id transacción', 'Cantidad', 'Precio', 'Estado');
$pdf->SetY(80);
$pdf->Orders_table($header_orders);

$pdf->SetFont('Arial', 'B', 40);
$pdf->Image('../resources/fpdf/fpdf186/compraRealizada.jpg', 60, 120, 90, 0, '', 'http://localhost/ecommerce/ecommerce_v.25/app/thank_you.php');

$pdf->Output();
?>

?>