<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf
{
	function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='portrait'){
		$options = new Dompdf\Options;
		$options->set('isRemoteEnabled', true);
		$dompdf = new Dompdf\Dompdf($options);
		$dompdf->load_html($html);
		$dompdf->set_paper($paper, $orientation);
		$dompdf->render();
		if($download)
			$dompdf->stream($filename.'.pdf', array('Attachment' => 1));
		else
			$dompdf->stream($filename.'.pdf', array('Attachment' => 0));
	}
}
?>