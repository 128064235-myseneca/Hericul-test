<?php

use setasign\Fpdi\Fpdi;

require_once('vendor/setasign/fpdf/fpdf.php');
require_once('vendor/autoload.php');
include '../DBConn/DBConnection.php';
global $pdf;

if (isset($_GET['ver_id'])) {
    $verification_id = trim($_GET['ver_id']);
    $sqlV = "SELECT * from certificate where verification_id = '$verification_id'";
    $cert = mysqli_query($conn, $sqlV);
    $countV = mysqli_num_rows($cert);
    $row = mysqli_fetch_array($cert);

    if ($countV == 1) {
        $name = $row['name'];
        $fromDate = date("F j, Y", strtotime($row['fromDate']));
        $toDate = date("F j, Y", strtotime($row['toDate']));
        $course = $row['course'];
        $photo = $row['photo'];
        $verification_id = $row['verification_id'];
        $course_duration = $row['course_duration'];
        $title = $row['title'];
        $trainer = $row['trainer'];
        $trainer_title = $row['trainer_title'];

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
        switch ($trainer) {
            case "Prakash Bhatt":
                $pdf->setSourceFile('certificateSource/Deerwalk Training Certificate_Prakash Bhatt.pdf');
                break;
            case "Shristi Baral":
                $pdf->setSourceFile('certificateSource/Deerwalk Training Certificate_Shristi Baral.pdf');
                break;
            case "Suraj Ghimire":
                $pdf->setSourceFile('certificateSource/Deerwalk Training Certificate_Suraj Ghimire.pdf');
                break;
            case "Shreyansh Lodha":
                $pdf->setSourceFile('certificateSource/Deerwalk Training Certificate_Shreyansh Lodha.pdf');
                break;
            default:
                $pdf->setSourceFile('certificateSource/Deerwalk Training Certificate.pdf');
        }
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
    $pdf->Write(0, $title . strtoupper($name));
//----------------------------------------------------------------------------------//
    // Course Section
//----------------------------------------------------------------------------------//
    $pdf->SetXY(1, 107);
    $pdf->SetFont('Calibri-Bold', "", 20);
    $pdf->Cell(0, 0, strtoupper($course), "", 2, 'C');
//----------------------------------------------------------------------------------//
    // Course Duration Section
//----------------------------------------------------------------------------------//
    setStyle(96.5, 126, 18, 'Calibri-Bold', $pdf);
    $pdf->Write(0, $course_duration);
//----------------------------------------------------------------------------------//
    // Date Section
//----------------------------------------------------------------------------------//
//    setStyle(103.5, 141, 17, 'Calibri-Bold', $pdf);
//    $pdf->Write(0, $fromDate);
    $pdf->SetFont('Calibri-Bold', "", 17);
    $pdf->Cell(47, 30, strtoupper($fromDate), "", 2, 'C');
    setStyle(165, 141, 17, 'Calibri-Bold', $pdf);
    $pdf->Write(0, strtoupper($toDate));
//----------------------------------------------------------------------------------//
    // Verification ID
//----------------------------------------------------------------------------------//
    $pdf->SetXY(144, -43.5);
    $pdf->SetFont('Calibri-Bold', "", 16);
    $pdf->Write(0.1, $verification_id);
//----------------------------------------------------------------------------------//
    // Trainer Details
//----------------------------------------------------------------------------------//
    $pdf->SetXY(-94, -12);
    $pdf->SetFont('Calibri', "", 14);
    $pdf->Cell(0, 0, strtoupper($trainer_title), "", 2, 'C');

    $pdf->SetXY(-91, -18);
    $pdf->SetFont('Calibri', "", 14);
    $pdf->Cell(0, 0, strtoupper($trainer), "", 2, 'C');
//----------------------------------------------------------------------------------//

    $fname = explode(" ", $name);
    $download_file_name = 'DTC_' . $fname[0] . '_' . $verification_id . '.pdf';
    $pdf->Output('D', $download_file_name);
//    $pdf->Output();
} else {
    $url = '../index.php';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; ' . $url . '">';
}
