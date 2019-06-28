<?php
/**
 * Created by PhpStorm.
 * User: saura
 * Date: 11/21/2018
 * Time: 9:37 PM
 */


use setasign\Fpdi\Fpdi;

require_once('vendor/setasign/fpdf/fpdf.php');
require_once('vendor/autoload.php');
include '../DBConn/DBConnection.php';
global $pdf;

if (isset($_GET['ver_id'])) {
    $verification_id = trim($_GET['ver_id']);
    $sqlV = "SELECT * from certificate_teachers where verification_id = '$verification_id'";
    $cert = mysqli_query($conn, $sqlV);
    $countV = mysqli_num_rows($cert);
    $row = mysqli_fetch_array($cert);

    if ($countV == 1) {
        $name = $row['name'];
        $verification_id = $row['verification_id'];
        $title = $row['title'];
    }
// initiate FPDI
    $pdf = new Fpdi('L');

    function setStyle($x_coordinate, $y_coordinate, $size, $font, $pdf)
    {
        $pdf->SetXY($x_coordinate, $y_coordinate);
        $pdf->SetFont($font, "", $size);
    }

    function addFont($pdf)
    {
        $pdf->AddFont("Calibri-Bold", "", "Calibrib.php");
        $pdf->AddFont("Calibri", "", "Calibri.php");

    }

//Add a blank page to the pdf
    $pdf->AddPage();

//set the source file of the created pdf
    try {
        $pdf->setSourceFile('certificateSource/Teachers Together Certificate.pdf');
    } catch (\setasign\Fpdi\PdfParser\PdfParserException $e) {
    }

//extract first page from the source pdf
    try {
        $template = $pdf->importPage(1);
    } catch (\setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException $e) {
    } catch (\setasign\Fpdi\PdfParser\Filter\FilterException $e) {
    } catch (\setasign\Fpdi\PdfParser\Type\PdfTypeException $e) {
    } catch (\setasign\Fpdi\PdfParser\PdfParserException $e) {
    } catch (\setasign\Fpdi\PdfReader\PdfReaderException $e) {
    }

//now use the extracted page as the template for new psd
    $pdf->useTemplate($template);

//add custom fonts
    addFont($pdf);

    $pdf->SetAutoPageBreak(false);

    // Name Section
//----------------------------------------------------------------------------------//
//set custom style with the coordinate of text its size and font
    setStyle(100, 73, 27, 'Calibri-Bold', $pdf);
//write the text with the height
    $pdf->Write(0, $title.strtoupper($name));
//----------------------------------------------------------------------------------//

//----------------------------------------------------------------------------------//
    // Verification ID
//----------------------------------------------------------------------------------//
    $pdf->SetXY(144, -68.5);
    $pdf->SetFont('Calibri-Bold', "", 16);
    $pdf->Write(0.1, $verification_id);
//----------------------------------------------------------------------------------//

    $fname = explode(" ", $name);
    $download_file_name = 'DTT_'.$fname[0].'_'.$verification_id.'.pdf';
    $pdf->Output('D',$download_file_name);
} else {
    $url = '../index.php';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; ' . $url . '">';
}