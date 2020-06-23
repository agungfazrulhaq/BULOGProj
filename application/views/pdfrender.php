<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/OpasetBulog/plugins/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$document = new Dompdf();

// $html = '
//  <style>
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
//   <tr>
//     <th>Company</th>
//     <th>Contact</th>
//     <th>Country</th>
//   </tr>
//   <tr>
//     <td>Alfreds Futterkiste</td>
//     <td>Maria Anders</td>
//     <td>Germany</td>
//   </tr>
//   <tr>
//     <td>Centro comercial Moctezuma</td>
//     <td>Francisco Chang</td>
//     <td>Mexico</td>
//   </tr>
//   <tr>
//     <td>Ernst Handel</td>
//     <td>Roland Mendel</td>
//     <td>Austria</td>
//   </tr>
//   <tr>
//     <td>Island Trading</td>
//     <td>Helen Bennett</td>
//     <td>UK</td>
//   </tr>
//   <tr>
//     <td>Laughing Bacchus Winecellars</td>
//     <td>Yoshi Tannamuri</td>
//     <td>Canada</td>
//   </tr>
//   <tr>
//     <td>Magazzini Alimentari Riuniti</td>
//     <td>Giovanni Rovelli</td>
//     <td>Italy</td>
//   </tr>
// </table>
// ';

$html = '
        <table style="font-family:Calibri, sans-serif;" border=1>
        <tr>  
        <th>TGL</th>
          <th>REF</th>
          <th>URAIAN</th>
          <th>DEBET</th>
          <th>KREDIT</th>
          <th>SALDO</th>
        </tr>
        </table>
';

$document->loadHtml($html);

$document->setPaper('A4', 'landscape');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("Laporan_Mutasi", array("Attachment" => false));
//1  = Download
//0 = Preview

exit(0);
