<?php
function prep_pdf($orientation = 'portrait')
{

	$CI = get_instance();

	$CI->cezpdf->selectFont (base_url () . 'fonts');

	$all = $CI->cezpdf->openObject();
	$CI->cezpdf->saveState();
	$CI->cezpdf->setStrokeColor(0,0,0,1);

	if($orientation == 'portrait')
	{
		$CI->cezpdf->ezSerMargins(50,70,50,50);
		$CI->cezpdf->ezStartPageNumbers(500,28,8,'','{PAGENUM}',1);
		$CI->cezpdf->line(20,40,570,40);
		$CI->cezpdf->addText(50,32,8,'Printed on', date('m/d/Y h:i:s a'));
		$CI->cezpdf->addText(50,22,8,'CI PDF TUTORIAL - http://www.google.com');

	}
	else
	{
		$CI->cezpdf->ezStartPageNumbers(750,28,8,'','{PAGENUM}',1);
		$CI->cezpdf->line(20,40,570,40);
		$CI->cezpdf->addText(50,32,8,'Printed on', date('m/d/Y h:i:s a'));
		$CI->cezpdf->addText(50,22,8,'CI PDF TUTORIAL - http://www.google.com');
	}
	$CI->cezpdf->restoreState();
	$CI->cezpdf->closeObject();
	$CI->cezpdf->addObject($all, 'all');
?>

