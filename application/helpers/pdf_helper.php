<?php
	function _gen_pdf($html, $filename, $title, $paper='A4')
	{
		include_once APPPATH.'/libraries/MPDF56/mpdf.php';

 		ob_end_clean();
 		$CI =& get_instance();
 		// $CI->load->library('MPDF56/mpdf');
 		$mpdf = new mPDF('utf-8', $paper);
 		$mpdf->debug = true;
 		$mpdf->setTitle($title);
 		$mpdf->WriteHTML($html);
 		$mpdf->Output($filename.".pdf" ,'I');
 	}
?>