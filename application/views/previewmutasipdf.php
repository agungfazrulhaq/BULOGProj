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
    font-family: Arial, Helvetica, sans-serif;
    font-size:12px;
    }

    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
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
    <?php if(isset($curr_aset) and isset($curr_month) and isset($curr_year)){ ?>
        <center>
        <b style="text-size:10px;">MUTASI KAS UB OPASET DIVRE SULSELBAR</b><br>
        <?php 
        foreach($aset as $rows){ 
            if($rows->id_aset == $curr_aset){
            ?>
            <b style="text-size:10px;">UNIT <?php echo $rows->nama_aset;?></b><br>
        <?php
            } 
        }
        
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
        
        </center>
    <?php } ?>
        <br>
        <table>
            <thead> 
            <tr> 
                <th id="WOIWOI" width=5px>TGL</th>
                <th colspan='2' width="15px">REF</th>
                <th width="300px">URAIAN</th>
                <th>DEBET</th>
                <th>KREDIT</th>
                <th>SALDO</th>
            </tr>
            </thead>
            <?php 
            $debcounter = 0;
            $krecounter = 0;
            $curr_saldo = 0;
            $currdeb = 0;
            $currkre = 0;
            ?>
            <tbody>
            <?php foreach($transaksi as $tranc){ ?>
            <tr>
                <td class="aligntengah" id="tdtgl<?php echo $tranc->id_transaksi;?>"><?php echo date("d",strtotime($tranc->tanggal)); ?></td>
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
                <td>&nbsp;</td>
                <td class="saldokanan"></td>
                <td class="saldokanan"></td>
                <td class="saldokanan"></td>
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
    $countrows = 0;
    foreach($transaksi as $tranc){
        if(isset($dateprev_)){
            if($dateprev_ == $tranc->tanggal){
                ?>
                <script>
                document.getElementById("tdtgl<?php echo $tranc->id_transaksi;?>").outerHTML = "";
                </script>
                <?php
            }else{
                $id_transaksi_2brs = $tranc->id_transaksi;
                $dateprev_ = $tranc->tanggal;
            }
        }
        else{
            $id_transaksi_2brs = $tranc->id_transaksi;
            $dateprev_ = $tranc->tanggal;
        }
        
    }
    $index_ = 0;
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