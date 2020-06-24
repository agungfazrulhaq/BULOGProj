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
    table,td, th{
        font-family:Arial, Helvetica, sans-serif; 
        font-size:12px; 
        border-collapse:collapse;
        border:1px solid;
    }

    th{
        text-align:center;
    }

    .saldokanan{
        text-align:right;
        width:100px;
    }

    .aligntengah{
        text-align:center;
    }

    </style>
    </head>
    <body>

        <center>
        <b style="text-size:10px;">MUTASI KAS UB OPASET DIVRE SULSELBAR</b><br>
        <b style="text-size:10px;">UNIT BARUGA LAPPO ASE</b><br>
        <b style="text-size:10px;">BULAN : NOVEMBER 2019</b>
        
        </center>
        <br>
        <table>
            <tr>  
                <th id="WOIWOI">TGL</th>
                <th colspan='2'>REF</th>
                <th>URAIAN</th>
                <th>DEBET</th>
                <th>KREDIT</th>
                <th>SALDO</th>
            </tr>
            <?php 
            $debcounter = 0;
            $krecounter = 0;
            $curr_saldo = 0;
            ?>
            <tbody>
            <?php foreach($transaksi as $tranc){ ?>
            <tr>
                <td class="aligntengah" id="tdtgl<?php echo $tranc->id_transaksi;?>" rowspans="0"><?php echo date("d",strtotime($tranc->tanggal)); ?></td>
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
                ?>
                <td class="saldokanan">&nbsp;&nbsp;<?php echo number_format($tranc->saldo, 2);?>&nbsp;&nbsp;</td>
                <td></td>
                <?php 
                } 
                else{
                    $curr_saldo -= $tranc->saldo;
                ?>
                <td></td>
                <td class="saldokanan">&nbsp;&nbsp;<?php echo number_format($tranc->saldo, 2);?>&nbsp;&nbsp;</td>
                <?php }?>
                <td class="saldokanan"><?php echo number_format($curr_saldo, 2); ?>&nbsp;&nbsp;</td>
            </tr>
            <?php } ?>
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            </tbody>
        </table>
    <?php
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