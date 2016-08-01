<?php

App::import('Vendor', 'pdfa4');
// create new PDF document
$pdf = new PDFA4(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Talleres Dafer');
$pdf->SetTitle('Orden');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(5, 28, PDF_MARGIN_RIGHT, true);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 50);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------
// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

/*
 * SUBCABECERA
 */

/*
 * Area de Tipo de Documento
 */

$tbl = '
<style>
            table.tipodoc {
                font-size: 1em;
                width: 100%;
                border: 1px solid black;
            }

            th {
                font-weight: bolder;
                text-align: center;
                border: 1px solid black;
            }
            td {   
                text-align: center;
                border: 0.2px solid #bbbbbb;
            }
            td.left{
                text-align: left;
            }
            td.left span {
                font-weight: bolder;
            }
            </style>
<table class="tipodoc">
    <tr>
        <th colspan="3" >ENTREGA DE TRABAJOS</th>
    </tr>
    <tr>
         <td>NÚMERO</td>
         <td>FECHA</td>
         <td></td>
    </tr>
    <tr>
       <td>' . zerofill($ordene['Ordene']['numero']) . '</td>
       <td>' . $this->Time->format('d-m-Y', $ordene['Ordene']['fecha_entrega']) . '</td>
    </tr>
    <tr>
        <td class="left" colspan="3"><span>CENTRO DE TRABAJO:</span> ' . $ordene['Centrostrabajo']['centrotrabajo'] . '</td>
    </tr>
    <tr>
        <td class="left" colspan="3"><span>MÁQUINA:</span> ' . $ordene['Maquina']['nombre'] . '</td>
    </tr>
    <tr>
        <td class="left" colspan="2"><span>SERIE:</span> ' . $ordene['Maquina']['serie_maquina'] . '</td>
        <td class="left" ><span>HORAS MÁQUINA:</span> ' . $ordene['Ordene']['horas_maquina'] . '</td>
    </tr>
</table>
';
$y_de_subcabecera = $pdf->GetY();
$pdf->writeHTMLCell('', '', $x + 8, $y_de_subcabecera + 10, $tbl, 0, 1, 0, true, 'J', true);
$x = $pdf->GetX();

/*
 * Area de Cliente
 */

$tbl = '
    <style>
        table.cliente {
            font-size: 1em;
            text-align: left;
            width: 675px;
            background-color: #ddd8c2;
        }
        .cif, .nombre_cliente {
            font-weight: bolder;
        }
    </style>
   
    <table class="cliente">
        <tr><td class="nombre_cliente">CLIENTE: ' . $ordene['Cliente']['nombre'] . '</td></tr>
        <tr><td class="cif">CIF: ' . $ordene['Cliente']['cif'] . '</td></tr>
        <tr><td>' . $ordene['Cliente']['direccion_postal'] . '</td></tr>
        <tr><td>' . $ordene['Cliente']['codigopostal'] . '  ' . $ordene['Cliente']['poblacionpostal'] . '</td></tr>
        <tr><td>' . $ordene['Cliente']['provinciapostal'] . '</td></tr>
    </table>
';
$pdf->writeHTMLCell('', '', $x + 2, $y_de_subcabecera + 48, $tbl, 0, 1, 0, true, 'J', true);

/*
 * Fin Area de Cliente
 */


/*
 * FIN DE SUBCABECERA 
 */


/*
 * Area de Articulos
 */

//Un poco de margen abajo para separar
$pdf->SetY($pdf->GetY() + 10);
$total = 0;

$pdf->SetY($pdf->GetY() + 10);

$tbl = '
    <style>
        table.entregatrabajo {
            font-size: 0.9em;
            text-align: left;
            width: 675px;
            border: 1.5px solid black;
            background-color:;
        }
        .entregatrabajo {
            font-weight: bolder;
        }
    </style>
   
    <table class="entregatrabajo">
		<tr><td class="entregatrabajo"></td></tr>
        <tr><td class="entregatrabajo">CONCEPTO: ' .$ordene['Ordene']['entregatrabajo'].'</td></tr>
        <tr><td class="entregatrabajo"></td></tr>
    </table>
';
$pdf->writeHTMLCell('', '', $x + 2, $y_de_subcabecera + 85, $tbl, 0, 1, 0, true, 'J', true);



$pdf->SetY($pdf->GetY() + 4);
$total = 0;
$lineas = '';
$html = '';
$i = 1;

$lineas = '';
$html = '';
$i = 1;

// output the HTML content
//$pdf->Rect($pdf->GetX(), $pdf->GetY(), 198, 200,'S');
$pdf->writeHTML($html, true, false, false, false, '');
$pdf->setY($pdf->getY() - 8);
/*
 * Area de totales
 */

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// reset pointer to the last page
$pdf->lastPage();
$pdf->setPrintFooter(false);

$html .= '
  <table class="cabecera">
  
    <tr>
        <td colspan="3" style="height: 40px;">NOMBRE, FIRMA Y DNI DEL CLIENTE:</td>
    </tr>
  </table>
';

$html .= '
  <table class="cabecera">
  <tr><td> </td></tr>
  <tr><td> </td></tr>
  <tr><td> </td></tr>
    <tr><td> </td></tr>
  <tr><td> </td></tr>

    <tr>
        <td colspan="4" style="height: 20px;">Conforme mano de obra y repuestos empleados en los trabajos realizados siguiendo sus instrucciones</td>
    </tr>
  </table>
';

$pdf->SetY(245, true, true);
$pdf->SetAutoPageBreak(FALSE, 10);
$pdf->writeHTML($html, 0, 1, 0, true, 'J', true);
$pdf->SetY(-5);
$pdf->SetFont('helvetica', 'I', 7);
$pdf->Cell('', '', ' ( Inscrita en el Registro Mercantil de Sevilla, Tomo 4225, Libro 0, Sección 8ª, Folio 1, Hoja SE 63.758, Inscripción 1ª, C.I.F.B-91/475319 )' . 'Pag. ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');


// ---------------------------------------------------------
//Close and output PDF document
$pdf->Output('presupuestoproveedor.pdf', 'I');
?>
