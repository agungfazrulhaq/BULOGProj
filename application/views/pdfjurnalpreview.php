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
        <!-- <tr>
            <td colspan='4'>(Jurnal untuk mencatat sesuatu)</td>

        </tr>
        <tr>
            <td colspan='2'>Kas</td>
            <td>13,500,000.00</td>
            <td></td>
        </tr>
        <tr>
            <td colspan='2'>Biaya PPh 4(2)</td>
            <td>1,227,273.00</td>
            <td></td>
        </tr>
        <tr>
            <td width=10px>&nbsp;</td>
            <td >Pendapatan Sewa</td>
            <td></td>
            <td>12,272,723.00</td>
        </tr>
        <tr>
            <td width=10px>&nbsp;</td>
            <td >PYD</td>
            <td></td>
            <td>-</td>
        </tr>
        <tr>
            <td width=10px>&nbsp;</td>
            <td >Hutang PPN</td>
            <td></td>
            <td>1,227,273.00</td>
        </tr>
        <tr>
            <td width=10px>&nbsp;</td>
            <td >Hutang PPh</td>
            <td></td>
            <td>1,227,273.00</td>
        </tr>
        <tr>
            <td colspan='4'>
            &nbsp;
            </td>
        </tr> -->
        <?php foreach($jurnal as $jurn){?>
        <!-- Per Jurnal -->
        <tr>
            <td colspan='4'>(<?php echo $jurn->nama_jurnal; ?>)</td>

        </tr>
        <?php $jumlah_perjurnal = 0;?>
        <?php foreach($jurnaljt as $jt){?>
        <?php   if($jt->jt_id_jurnal==$jurn->id_jurnal){?>
        <tr>
            <td colspan='2' width="250px"><?php echo $jt->nama_jt;?></td>
            <td><?php  echo  number_format($jt->kas, 2);?></td>
            <td></td>
        </tr>
        <?php $jumlah_perjurnal+=$jt->kas;?>
        <?php   }?>
        <?php } ?>
        <tr>
            <td width=10px>&nbsp;</td>
            <td >Kas</td>
            <td></td>
            <td><?php echo number_format($jumlah_perjurnal, 2);?></td>
        </tr>
        <tr>
            <td colspan='4'>
            &nbsp;
            </td>
        </tr>
        <?php } ?>
        <!-- Per Jurnal -->
        <!-- <tr>
            <td colspan='4'>(Jurnal untuk mencatat sesuatu)</td>

        </tr>
        <tr>
            <td colspan='2'>Biaya sesuatu</td>
            <td>13,500,000.00</td>
            <td></td>
        </tr>
        <tr>
            <td width=10px>&nbsp;</td>
            <td >Kas</td>
            <td></td>
            <td>13,500,000.00</td>
        </tr>
        <tr>
            <td colspan='4'>
            &nbsp;
            </td>
        </tr> -->
        
        </tbody>
    </table>
</body>

</html>
