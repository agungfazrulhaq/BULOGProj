<!DOCTYPE HTML>
<html>
    <head>
        <title>Preview PDF</title>
    <style>
        
    

    td.borderleft0{
        border-left:0px solid;
    }

    td.borderright0{
        border-right:0px solid;
    }

    .saldokanan{
        text-align:right;
        width:100px;
    }

    .aligntengah{
        text-align:center;
    }

    body {
        font-family: Tahoma, Verdana, Segoe, sans-serif;;
        font-size:10px;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        border-top:0px solid black;
        border-right:0px solid black;
        border-left:0px solid black;
    }

    td{
        border-left:1px solid black;
        border-right:1px solid black;
    }

    th.border0head{
        border:0px solid;
        text-align:center;
    }

    th {
        text-align: center;
        height: 10px;
        padding-left: 10px;
        padding-right: 10px;
    }

    .ram {
        text-align:left;
        padding-left:15px;
    }

    .tj{
        background-color: #DCDCDC;
    }


    </style>
    </head>
    <body>
    
        <br>
        <table style="page-break-inside: avoid;">
            <thead>
                <tr style="border-left:0px solid;">
                    <th style="border-left:0px solid;" colspan="7" class="border0head">
            <?php if(isset($curr_aset) and isset($curr_month) and isset($curr_year)){ ?>
        <b style="text-size:10px;">MUTASI KAS UB OPASET DIVRE SULSELBAR</b><br>
        <?php 
        foreach($aset as $rows){
            if($rows->id_aset == $curr_aset){
            ?>
            <b style="text-size:10px;">UNIT <?php echo $rows->nama_aset;?></b><br>
        <?php
            } 
        }
        
        $ind_months = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

        $rowspannya = array();
        $countrows_ = 0;
        foreach($transaksi as $tranc){
            if(isset($dateprev)){
                if($dateprev == $tranc->tanggal){
                    $countrows_ +=1;
                }
                else{
                    array_push($rowspannya,$countrows_);
                    $countrows_ = 1;
                    $dateprev = $tranc->tanggal;
                }
            }
            else{
                $dateprev = $tranc->tanggal;
                $countrows_ +=1;
            }
        }
        array_push($rowspannya,$countrows_);
        ?>
        <b style="text-size:10px;">BULAN : <?php if (isset($curr_month)) {
                        if ($curr_month == 0) {
                          echo "Bulan";
                        } else if ($curr_month == 1) {
                          echo "JANUARI";
                        } else if ($curr_month == 2) {
                          echo "FEBRUARI";
                        } else if ($curr_month == 3) {
                          echo "MARET";
                        } else if ($curr_month == 4) {
                          echo "APRIL";
                        } else if ($curr_month == 5) {
                          echo "MEI";
                        } else if ($curr_month == 6) {
                          echo "JUNI";
                        } else if ($curr_month == 7) {
                          echo "JULI";
                        } else if ($curr_month == 8) {
                          echo "AGUSTUS";
                        } else if ($curr_month == 9) {
                          echo "SEPTEMBER";
                        } else if ($curr_month == 10) {
                          echo "OKTOBER";
                        } else if ($curr_month == 11) {
                          echo "NOVEMBER";
                        } else if ($curr_month == 12) {
                          echo "DESEMBER";
                        }
                    } 
                        echo "&nbsp;".$curr_year;
                        ?></b>
                        <br>&nbsp;
    <?php } ?>
                </th>
                </tr>
            <tr style="border:1px solid black;"> 
                <th style="border:1px solid black;" id="WOIWOI" width=5px>TGL</th>
                <th style="border:1px solid black;" colspan='2' width="15px">REF</th>
                <th style="border:1px solid black;" width="300px">URAIAN</th>
                <th style="border:1px solid black;" >DEBET</th>
                <th style="border:1px solid black;" >KREDIT</th>
                <th style="border:1px solid black;" >SALDO</th>
            </tr>
            </thead>
            <?php 
            $debcounter = 0;
            $krecounter = 0;
            $curr_saldo = 0;
            $currdeb = 0;
            $currkre = 0;
            $countrows = 0;
            $index_ = 0;
            ?>
            <tbody>
            <?php foreach($saldoawal as $sald){?>
            <tr>
                <td style="border:1px solid black;text-align:center;" id="WOIWOI" width=5px>1</td>
                <td style="border:1px solid black;" colspan='2' width="15px"></td>
                <td style="border:1px solid black;" width="300px"><b>Saldo awal bulan <?php echo $ind_months[$curr_month-1];?>&nbsp;<?php echo $curr_year;?></b></td>
                <td style="border:1px solid black;text-align:center;" >-</td>
                <td style="border:1px solid black;text-align:center;" >-</td>
                <td style="border:1px solid black;" class="saldokanan" ><b><?php echo number_format($sald->saldo,2);?></b>&nbsp;&nbsp;</td>
                <?php $curr_saldo+=$sald->saldo;?>
            </tr>
            <?php }?>
            <tr>
                <td style="border:1px solid black;" id="WOIWOI" width=5px>&nbsp;</td>
                <td style="border:1px solid black;" colspan='2' width="15px"></td>
                <td style="border:1px solid black;" width="300px"></td>
                <td style="border:1px solid black;" ></td>
                <td style="border:1px solid black;" ></td>
                <td style="border:1px solid black;" ></td>
        
            </tr>
            <?php foreach($transaksi as $tranc){ ?>
            <tr dontbreak="true">
                <?php
                        if(isset($dateprev_)){
                            if($dateprev_ == $tranc->tanggal){
                            }else{
                                $id_transaksi_2brs = $tranc->id_transaksi;
                                $dateprev_ = $tranc->tanggal;?>
                                <td style="text-align:center;" rowspan="<?php echo $rowspannya[$index_];?>">
                                    <?php echo date("d",strtotime($tranc->tanggal));?>
                                </td>
                                <?php
                                $index_+=1;
                            }
                        }
                        else{
                            $id_transaksi_2brs = $tranc->id_transaksi;
                            $dateprev_ = $tranc->tanggal;
                            ?>
                            <td style="text-align:center;" rowspan="<?php echo $rowspannya[$index_];?>">
                                <?php echo date("d",strtotime($tranc->tanggal));?>
                            </td>
                            <?php
                            $index_+=1;
                        }
                ?>
                <!-- <td class="aligntengah" id="tdtgl<?php echo $tranc->id_transaksi;?>"><?php echo date("d",strtotime($tranc->tanggal)); ?></td> -->
                <?php
                    if(strpos($tranc->ref,"D")!==false){
                        $ref_ = "D";
                        $debcounter +=1;
                        if($debcounter<10){
                            $ref_ .= "0".$debcounter;
                        }
                        else{
                            $ref_ .= $debcounter;    
                        }
                        ?>
                        <td class="aligntengah borderright0" style="border-right:0px solid;"><?php echo $ref_;?></td>
                        <td style="border-left:0px solid;">&nbsp;</td>
                        <?php
                    }
                    else{
                        $ref_ = "K";
                        $krecounter +=1;
                        if($krecounter<10){
                            $ref_ .= "0".$krecounter;
                        }
                        else{
                            $ref_ .= $krecounter;    
                        }
                        ?>
                        <td style="border-right:0px solid;">&nbsp;</td>
                        <td class="aligntengah borderleft0" style="border-left:0px solid;"><?php echo $ref_;?></td>
                        <?php
                    }
                ?>
                
                <td><?php 
                $uraian__ = explode("<br>",$tranc->uraian);
                $uraian_ = implode("",$uraian__);
                $uraian___ = explode("<p>",$uraian_);
                $uraian____ = implode("",$uraian___);
                $uraian_____ = explode("</p>",$uraian____);
                $uraian______ = implode("",$uraian_____);
                echo chop($uraian______,"<br>"); ?></td>
                <?php 
                if(strpos($tranc->ref,"D")!==false){ 
                    $curr_saldo += $tranc->saldo;
                    $currdeb += $tranc->saldo;
                ?>
                <td class="saldokanan">&nbsp;&nbsp;<?php echo number_format($tranc->saldo, 2);?>&nbsp;&nbsp;</td>
                <td></td>
                <?php 
                } 
                else{
                    $curr_saldo -= $tranc->saldo;
                    $currkre += $tranc->saldo;
                ?>
                <td></td>
                <td class="saldokanan">&nbsp;&nbsp;<?php echo number_format($tranc->saldo, 2);?>&nbsp;&nbsp;</td>
                <?php }?>
                <td class="saldokanan"><?php echo number_format($curr_saldo, 2); ?>&nbsp;&nbsp;</td>
            </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td>&nbsp;</td>
                <td class="saldokanan"></td>
                <td class="saldokanan"></td>
                <td class="saldokanan"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td><b>Saldo akhir bulan <?php echo $ind_months[$curr_month-1];?>&nbsp;<?php echo $curr_year;?></b></td>
                <td class="saldokanan"></td>
                <td class="saldokanan"></td>
                <td class="saldokanan"><b><?php echo number_format($curr_saldo, 2); ?></b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td><b>JUMLAH</b></td>
                <td class="saldokanan"><b><?php echo number_format($currdeb, 2); ?></b></td>
                <td class="saldokanan"><b><?php echo number_format($currkre, 2); ?></b></td>
                <td class="saldokanan"><b><?php echo number_format($curr_saldo, 2); ?></b></td>
            </tr>
            </tbody>
        </table>
    <?php 
    foreach($transaksi as $tranc){
        if(isset($dateprev__)){
            if($dateprev__ == $tranc->tanggal){
            }
            else{
                $dateprev__ = $tranc->tanggal;?>
                <script>
                    document.getElementById("tdtgl<?php echo $tranc->id_transaksi?>").rowSpan=<?php echo $rowspannya[$index_];?>;
                </script>
                <?php
                $index_+=1;
            }
        }
        else{
            $dateprev__ = $tranc->tanggal;
            ?>
            <script>
                document.getElementById("tdtgl<?php echo $tranc->id_transaksi?>").rowSpan=<?php echo $rowspannya[$index_];?>;
            </script>
            <?php
            $index_+=1;
        }
    }
    ?>
    <script>
    // document.getElementById("tdtgl<?php echo $tranc->id_transaksi;?>").outerHTML = "";
    // window.print();
    </script>
    </body>
</html>