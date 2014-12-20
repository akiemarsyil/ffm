<?php
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 006');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
$total = $param['jml'] * $param['harga'];
// add a page Portrait A4
$pdf->AddPage('P', 'A4');

// set font
$pdf->SetFont('helvetica', 'B', 20);

$pdf->Write(0, 'Fantasy Film Malang', '', 0, 'C', true, 0, false, false, 0);

// set core font
$pdf->SetFont('helvetica', '', 12);
//ganti baris
$pdf->Ln();

$pdf->Write(0, 'Nama : '.$param['name'].' ', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln();
$pdf->Write(0, 'Alamat : '.$param['address'].' ', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln();
$pdf->Write(0, 'Email : '.$param['email'].' ', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln();
$pdf->Write(0, 'Film : '.$param['movie'].' ', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln();
$pdf->Write(0, 'Bioskop : '.$param['cinema'].' ', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln();
$pdf->Write(0, 'Hari : '.$param['hari'].' ', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln();
$pdf->Write(0, 'Pukul : '.$param['pukul'].' ', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln();
$pdf->Write(0, 'Harga : '.format_rupiah($param['harga']).' ', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln();
$pdf->Write(0, 'Jumlah : '.$param['jml'].' ', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln();
$pdf->Write(0, 'Total Pembayaran : '.format_rupiah($total).' ', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln();

//Close and output PDF document
$pdf->Output('ffm.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+