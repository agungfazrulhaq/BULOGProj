<?php
//index.php
//include autoloader

require_once $_SERVER['DOCUMENT_ROOT'].'/OpasetBulog/plugins/'.'dompdf/autoload.inc.php';

// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();


// //$document->loadHtml($html);
$page = file_get_contents(base_url("Home/previewpdf"));

// //$document->loadHtml($page);

// $connect = mysqli_connect("localhost", "root", "", "testing1");

// $query = "
// 	SELECT category.category_name, product.product_name, product.product_price
// 	FROM product 
// 	INNER JOIN category 
// 	ON category.category_id = product.category_id
// ";
// $result = mysqli_query($connect, $query);

// $output = "
// 	<style>
// table {
//     font-family: arial, sans-serif;
//     border-collapse: collapse;
//     width: 100%;
// }

// td, th {
//     border: 1px solid #dddddd;
//     text-align: left;
//     padding: 8px;
// }

// tr:nth-child(even) {
//     background-color: #dddddd;
// }
// </style>
// <table>
// 	<tr>
// 		<th>Category</th>
// 		<th>Product Name</th>
// 		<th>Price</th>
// 	</tr>
// ";

// while($row = mysqli_fetch_array($result))
// {
// 	$output .= '
// 		<tr>
// 			<td>'.$row["category_name"].'</td>
// 			<td>'.$row["product_name"].'</td>
// 			<td>$'.$row["product_price"].'</td>
// 		</tr>
// 	';
// }

// $output .= '</table>';

//echo $output;

$document->loadHtml($page);

//set page size and orientation

$document->setPaper('A4', 'landscape');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("Webslesson", array("Attachment"=>0));
//1  = Download
//0 = Preview


?>