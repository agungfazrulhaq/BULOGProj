<?php defined('BASEPATH') OR exit('No direct script access allowed');
//index.php
//include autoloader

require_once $_SERVER['DOCUMENT_ROOT'].'/OpasetBulog/plugins/'.'dompdf/autoload.inc.php';

// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();


// //$document->loadHtml($html);

$page = file_get_contents(base_url("Home/previewlabapdf"));


$document->loadHtml($page);

//set page size and orientation

$document->setPaper('A4', 'landscape');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("Laporan_LABARUGI", array("Attachment"=>0));
//1  = Download
//0 = Preview
exit;


?>