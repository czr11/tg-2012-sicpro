
<?php 
App::import('Vendor','tcpdf/tcpdf');  
ob_clean();

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $logo_file = K_PATH_IMAGES.'logo_mag.jpg';
		$this->Image($logo_file, 20, 20, 40, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Fuente
        $this->SetFont('helvetica', 'B', 10);
        // Titulo
        $this->MultiCell(98, 15, 'MINISTERIO DE AGRICULTURA Y GANADERIA DIRECCION GENERAL DE ORDENAMIENTO FORESTAL, CUENCAS Y RIEGO 
        DIVISION DE RIEGO Y DRENAJE, AREAS DE PROYECTO', 0, 'C', false, 1, 65, 20, true, 0, false, true, 0, 'M', false);
		
		
		//$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
		
		// escudo
		$escudo_file = K_PATH_IMAGES.'escudo.jpg';
		$this->Image($escudo_file, 168, 20, 22, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		
		$this->Cell(0, 10, date("d/m/yy H:i:s"), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
	
	 // Colored table
    public function ColoredTable($headert,$header,$avancesupervision) {
        // Colors, line width and bold font
        $this->SetTextColor(140,140,140);
        $this->Cell(150, 6, 'Tabla de Avances Programados vs Informes de Avance a la fecha', 0, 0, 'C', 0,'',0,true,'C','C');
		$this->Ln();
		$this->Cell(30, 7, '', 0, 0, 'C', 0);
        $this->SetFillColor(230, 237, 245);
        $this->SetTextColor(79,118,163);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        
        $w = array(60, 60);
        $num_headers = count($headert);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $headert[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        
        $w = array(30, 30, 30, 30, 30);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(247, 249, 252);
        $this->SetTextColor(0,5,85);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach ($avancesupervision as $supi) {
            $this->Cell($w[0], 6, date('d/m/Y',strtotime($supi['0']['fechaavance'])), 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, number_format($supi['0']['porcentajeavfisicoprog'],2).'%', 'LR', 0, 'R', $fill);
            $this->Cell($w[2], 6, number_format($supi['0']['porcentajeavancefisico'],2).'%', 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, '$'.number_format($supi['0']['montoavfinancieroprog'],2), 'LR', 0, 'R', $fill);
			$this->Cell($w[4], 6, '$'.number_format($supi['0']['valoravancefinanciero'],2), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }

	public function ColoredTablea($headert,$header,$estimaciones) {
        // Colors, line width and bold font
        $this->SetTextColor(140,140,140);
        $this->Cell(120, 6, 'Tabla Estimaciones a la fecha', 0, 0, 'C', 0,'',0,true,'C','C');
		$this->Ln();
        
        $this->SetFillColor(230, 237, 245);
        $this->SetTextColor(79,118,163);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        
        $w = array(60, 40, 50);
        $num_headers = count($headert);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $headert[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        
        $w = array(30, 30, 20, 20, 25, 25);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(247, 249, 252);
        $this->SetTextColor(0,5,85);
        $this->SetFont('');
        // Data
        $fill = 0;
		$acumulado = 0;
		$pacumulado = 0;
        foreach ($estimaciones as $esti) {
        	$acumulado = $acumulado + $esti['Estimacion']['montoestimado'];
			$pacumulado = $pacumulado + $esti['Estimacion']['porcentajeestimadoavance'];
            $this->Cell($w[0], 6, date('d/m/Y',strtotime($esti['Estimacion']['fechainicioestimacion'])), 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, date('d/m/Y',strtotime($esti['Estimacion']['fechafinestimacion'])), 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, number_format($esti['Estimacion']['porcentajeestimadoavance'],2).'%', 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, number_format($pacumulado,2).'%', 'LR', 0, 'R', $fill);
            $this->Cell($w[4], 6, '$'.number_format($esti['Estimacion']['montoestimado'],2), 'LR', 0, 'R', $fill);
            $this->Cell($w[5], 6, '$'.number_format($acumulado,2), 'LR', 0, 'R', $fill);
			$this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('TG2012 - SICPRO');
$pdf->SetTitle('Informe de Estado de Avance por Contrato');
$pdf->SetSubject('Avance de Contrato');
$pdf->SetKeywords('Proyecto, Contrato, MAG, Avance, Graficas');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(25, 50, 20);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(0, 10, 'Estado de Avance de Contrato', 0, false, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Ln(20);

$pdf->SetFont('helvetica', '', 11);



$html = '

<style>
    table.detailtable {
        font-family: helvetica;
        font-size: 10pt;
    }
    td.first {
        width: 200px;
        font-weight: bold;
		text-align: right;
		padding-right: 5px;
    }
	
	td.second {
        
        
		text-align: justify;
		padding-left: 5px;
    }
    

</style>
<h2>Resumen de Contrato </h2>
		<table  class="detailtable">
			<tr> <td class="first">Número:</td>			<td class="second"> ' . $contrato['Proyecto']['numeroproyecto'] . '</td> </tr>
			<tr> <td class="first">Proyecto:</td>		<td class="second"> ' . $contrato['Proyecto']['nombreproyecto'] . '</td> </tr>
			<tr> <td class="first">Código:</td>			<td class="second"> ' . $contrato['Contratoconstructor']['codigocontrato'] . '</td> </tr>
			<tr> <td class="first">Contrato:</td>		<td class="second"> ' . $contrato['Contratoconstructor']['nombrecontrato'] . '</td> </tr>
			<tr> <td class="first">Monto Planeado:</td>	<td class="second"> ' . '$'.number_format($contrato['Contratoconstructor']['montooriginal'],2) . '</td> </tr>
			<tr> <td class="first">Estado:</td>  		<td class="second"> ' . $contrato['Contratoconstructor']['estadocontrato'] . '</td> </tr>
			<tr> <td class="first">Orden de Inicio:</td><td class="second"> ' . $contrato['Contratoconstructor']['ordeninicio'] . '</td> </tr>
			<tr> <td class="first">Empresa:</td>  		<td class="second"> ' . $contrato['Empresa']['nombreempresa'] . '</td> </tr>
			<tr> <td class="first">Administrador de Contrato:</td>  <td class="second"> ' . $contrato['Persona']['nombrecompleto'] . '</td> </tr>';

$html .= '</table>';
		
$htmlc	=	'<h2 style="margin-top=20px">Avance Fisico y Financiero</h2>
		<div id = "tablagrid"  class="tab">';

		
$pdf->writeHTML($html, true, false, true, false, '');		
$pdf->Ln(5);
$pdf->writeHTML($htmlc, true, false, true, false, '');
$pdf->Ln(5);

if(!empty($avancesupervision)) {
	$headert = array('Físico', 'Financiero');
	$header = array('Fecha', 'Prog', 'Ejecutado', 'Prog', 'Ejecutado');
	$pdf->SetFont('helvetica', '', 10);
	$pdf->ColoredTable($headert,$header,$avancesupervision);
} else {
	$htmla =  'No hay avances asociados a este contrato en particular';
	$pdf->writeHTML($htmla, true, false, true, false, '');
	$pdf->Ln(5);  
}

$pdf->Ln(10);
if(!empty($estimaciones)) {
	$headert = array('Periodo','Físico', 'Financiero');
	$header = array('Inicio', 'Fin', 'Estimado', 'Acumulado', 'Estimado', 'Acumulado');
	$pdf->SetFont('helvetica', '', 10);
	$pdf->ColoredTablea($headert,$header,$estimaciones);
} else {
	$htmlb =  'No hay estimaciones asociadas a este contrato en particular';
	$pdf->writeHTML($htmlb, true, false, true, false, '');
	$pdf->Ln(5);
}




//$header = array('Código', 'Nombre', 'Plazo', 'Monto', 'Empresa');
//$pdf->SetFont('helvetica', '', 10);
//$pdf->ColoredTable($header,$proyectos);
// ---------------------------------------------------------

/*
$pdf->AddPage();

$html = '<h1>Reporte de Contratos por proyecto</h1>
Reporte de Contratos por proyecto
<h2>Reporte:</h2>
<table border="1" cellpadding="5px">
	<tr>
		<th width="75px" align="center"> Código </th>
		<th width="250px" align="center"> Nombre Contrato </th>
		<th width="50px" align="center"> Plazo </th>
		<th width="100px" align="center"> Monto </th>
		<th width="100px" align="center"> Empresa </th>
	</tr>';
	
	foreach ($proyectos as $proy):
		$html .= '<tr>';
			$html .= '<td align="center">' . $proy['Contrato']['codigocontrato'] . '</td>';
			$html .= '<td>' . $proy['Contrato']['nombrecontrato'] . '</td>';
			$html .= '<td align="center">' . $proy['Contrato']['plazoejecucion'] . '</td>';
			$html .= '<td align="center">$ ' . number_format($proy['Contrato']['montooriginal'],2) . '</td>';
			$html .= '<td>' . $proy['Empresa']['nombreempresa'] . '</td>';
		$html .= '</tr>';
	endforeach;

$html .= '</table>';*/

// output the HTML content
//$pdf->writeHTML($html, true, false, true, false, '');


// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('AvanceContrato.pdf', 'I');
exit;
//============================================================+
// END OF FILE
//============================================================+
?>