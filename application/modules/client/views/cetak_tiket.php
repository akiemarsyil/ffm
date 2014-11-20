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

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();
// print_r($content['name']);exit;
$isi = "<tr>
				<td>".$content['cinema']."</td>
				<td>".$content['movie']."</td>
				<td>".$content['hari']."</td>
				<td>".$content['pukul']."</td>
				<td>".$content['jml']."</td>
				<td>".$content['harga']."</td>
			</tr>";

//create HTML content
$html = "<h1 style=\"text-align:center\">Fantasy Film Malang</h1>
		<div class=\"row\">
			<div class=\"col-md-2\">
				<label>Nama : </label>
			</div>
			<div class=\"col-md-4\">
				<label>".$content['name']."</label>
			</div>
		</div><br>
		<div class=\"row\">
			<div class=\"col-md-2\">
				<label>alamat : </label>
			</div>
			<div class=\"col-md-4\">
				<label>".$content['address']."</label>
			</div>
		</div><br>
		<div class=\"row\">
			<div class=\"col-md-2\">
				<label>Tanggal : </label>
			</div>
			<div class=\"col-md-4\">
				<label>".$tgl."</label>
			</div>
		</div><br>
		<table class=\"table display table-bordered table-hover\">
			<thead>
				<tr>
					<th>Bioskop</th>
					<th>Film</th>
					<th>Hari</th>
					<th>Mulai</th>
					<th>Jumlah</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>".
				$isi
			."/tbody>
		</table>";

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('ffm.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+