<!DOCTYPE HTML>
<html>
<head>
<?php
    $month_arr = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    $month_ind = $month-1;
?>
    <title>
        Jurnal <?php echo $aset->nama_aset." ".$month_arr[$month_ind]." ".$year;?>
    </title>
<style>
    body{
        font-family:Tahoma,sans-serif;
        font-size:12px;
    }
</style>
</head>

<body>
    <u><h4> <?php echo strtoupper($aset->nama_aset).", BULAN : ".strtoupper($month_arr[$month_ind])." ".$year;?></h4></u>
    <table>
        <tbody>
        <!-- Per Jurnal -->
        <tr>
            <td colspan='4'>(Jurnal untuk mencatat sesuatu)</td>

        </tr>
        <tr>
            <td colspan='2'>Kas</td>
            <td>13,500,000.00</td>
            <td></td>
        </tr>
        <tr>
            <td width=10px>&nbsp;</td>
            <td >Biaya sesuatu</td>
            <td></td>
            <td>13,500,000.00</td>
        </tr>
        <tr>
            <td colspan='4'>
            &nbsp;
            </td>
        </tr>

        <!-- Per Jurnal -->
        <tr>
            <td colspan='4'>(Jurnal untuk mencatat sesuatu)</td>

        </tr>
        <tr>
            <td colspan='2'>Kas</td>
            <td>13,500,000.00</td>
            <td></td>
        </tr>
        <tr>
            <td width=10px>&nbsp;</td>
            <td >Biaya sesuatu</td>
            <td></td>
            <td>13,500,000.00</td>
        </tr>
        <tr>
            <td colspan='4'>
            &nbsp;
            </td>
        </tr>

        <!-- Per Jurnal -->
        <tr>
            <td colspan='4'>(Jurnal untuk mencatat sesuatu)</td>

        </tr>
        <tr>
            <td colspan='2'>Kas</td>
            <td>13,500,000.00</td>
            <td></td>
        </tr>
        <tr>
            <td width=10px>&nbsp;</td>
            <td >Biaya sesuatu</td>
            <td></td>
            <td>13,500,000.00</td>
        </tr>
        <tr>
            <td colspan='4'>
            &nbsp;
            </td>
        </tr>
        
        </tbody>
    </table>
</body>

</html>
