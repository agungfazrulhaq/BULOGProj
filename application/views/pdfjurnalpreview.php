<!DOCTYPE HTML>
<html>
<head>
<?php
    $saldoawal_ = 0;
    foreach($saldoawalbulan as $saldoawal){
        $saldoawal_ += $saldoawal->saldo;
    }
    $month_arr = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    $month_ind = $month-1;
    $saldoakhir = $saldoawal_;
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
    </div>
    <table>
        <thead>
        <tr>
            <th colspan=3 style="text-align:left;">
            <h4><u class="p-2"><?php echo strtoupper($aset->nama_aset).", BULAN : ".strtoupper($month_arr[$month_ind])." ".$year;?></u></h4>
            </th>
            <th>Saldo Awal : </th>
            <th><?php echo number_format(round($saldoawal_), 2);?></th>
        </tr>
        </thead>
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
            <?php if($jurn->pyd_stat == '1'){?>
                <tr>
            <td colspan='4'>(<?php echo $jurn->nama_jurnal; ?>)</td>

            </tr>
            <?php $jumlah_perjurnal = 0;?>
            <?php foreach($jurnaljt as $jt){?>
            <?php   if($jt->jt_id_jurnal==$jurn->id_jurnal){?>
            <tr>
                <td colspan='2'>Kas</td>
                <?php 
                if($jurn->jenistransaksi_jurnal==1){
                    $saldoakhir += $jt->kas;
                }
                else{
                    $saldoakhir -= $jt->kas;
                }
                ?>
                
                <td><?php  echo  number_format(round($jt->kas), 2);?></td>
                <td></td>
            </tr>
            <?php $jumlah_perjurnal+=$jt->kas;?>
            <?php   }?>
            <?php } 
            $kas_1 = $jumlah_perjurnal - $jumlah_perjurnal/1.1;
            ?>
                    <td colspan='2'>Biaya PPh 4(2)</td>
                    <td><?php echo number_format(round($kas_1), 2);?></td>
                    <td></td>
                </tr>
                <tr>
                    <td width=10px>&nbsp;</td>
                    <td >Pendapatan Sewa</td>
                    <td></td>
                    <td><?php echo number_format(round($jumlah_perjurnal/(1.1)), 2);?></td>
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
                    <td><?php echo number_format(round($kas_1), 2);?></td>
                </tr>
                <tr>
                    <td width=10px>&nbsp;</td>
                    <td >Hutang PPh</td>
                    <td></td>
                    <td><?php echo number_format(round($kas_1), 2);?></td>
                </tr>
                <tr>
                    <td colspan='4'>
                    &nbsp;
                    </td>
                </tr>
            <?php 
            }
            else{    
            ?>
        <?php if($jurn->jenistransaksi_jurnal==0){?>
        <!-- Per Jurnal -->
        <tr>
            <td colspan='4'>(<?php echo $jurn->nama_jurnal; ?>)</td>

        </tr>
        <?php $jumlah_perjurnal = 0;?>
        <?php foreach($jurnaljt as $jt){?>
        <?php   if($jt->jt_id_jurnal==$jurn->id_jurnal){?>
        <tr>
            <td colspan='2' width="250px"><?php echo $jt->nama_jt;?></td>
            <?php
            $saldoakhir -= $jt->kas;
                
            ?>
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
                <?php 
                }
                else{
            ?>
        <tr>
            <td colspan='4'>(<?php echo $jurn->nama_jurnal; ?>)</td>

        </tr>
        <?php $jumlah_perjurnal = 0;?>
        <?php foreach($jurnaljt as $jt){?>
        <?php   if($jt->jt_id_jurnal==$jurn->id_jurnal){?>
        <?php $jumlah_perjurnal+=$jt->kas;?>
        <?php
                    $saldoakhir += $jt->kas;
            ?>
        <?php   }?>
        <?php } ?>
        <tr>
            <td colspan='2'>Kas</td>
            <td><?php  echo  number_format($jumlah_perjurnal, 2);?></td>
            <td></td>
        </tr>
        <?php foreach($jurnaljt as $jt){?>
        <?php   if($jt->jt_id_jurnal==$jurn->id_jurnal){?>
        <tr>
            <td width=10px>&nbsp;</td>
            <td ><?php echo $jt->nama_jt;?></td>
            <td></td>
            <td><?php echo number_format($jt->kas, 2);?></td>
        </tr>
        <?php   }?>
        <?php } ?>
        <tr>
            <td colspan='4'>
            &nbsp;
            </td>
        </tr>
                <?php } ?>
            <?php } ?>
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
        
        <tfoot>
        <tr>
            <th colspan=3 style="text-align:left;">
            </th>
            <th>Saldo Akhir : </th>
            <th><?php echo number_format(round($saldoakhir), 2);?></th>
        </tr>
        </tfoot>
    </table>
</body>

</html>
