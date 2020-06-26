<?php
//index.php
//include autoloader

require_once $_SERVER['DOCUMENT_ROOT'].'/OpasetBulog/plugins/'.'dompdf/autoload.inc.php';

// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();


// //$document->loadHtml($html);

if(isset($curr_aset) and isset($curr_month) and isset($curr_year)){
  $page = file_get_contents(base_url("Home/previewmutasipdf/".$curr_aset."/".$curr_month."/".$curr_year));
}


$document->loadHtml($page);

//set page size and orientation

$document->setPaper('A4', 'potrait');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("Webslesson", array("Attachment"=>0));
//1  = Download
//0 = Preview
exit(0);


?>