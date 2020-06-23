<!DOCTYPE HTML>
<html>
    <head>
        <title>Preview PDF</title>
    </head>
    <body>
        <table style='font-family:Arial, Helvetica, sans-serif; font-size:12px; border-collapse:collapse;' border=1>
            <tr>  
                <td>TGL</td>
                <td>REF</td>
                <td>URAIAN</td>
                <td>DEBET</td>
                <td>KREDIT</td>
                <td>SALDO</td>
            </tr>
            <?php 
            $debcounter = 0;
            $krecounter = 0;
            $curr_saldo = 0;
            ?>
            <tbody>
            <?php foreach($transaksi as $tranc){ ?>
            <tr>
                <td><?php echo date("d",strtotime($tranc->tanggal)); ?></td>
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
                    }
                ?>
                
                <td><?php echo $ref_;?></td>
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
                <td>&nbsp;&nbsp;<?php echo number_format($tranc->saldo, 2);?></td>
                <td></td>
                <?php 
                } 
                else{
                    $curr_saldo -= $tranc->saldo;
                ?>
                <td></td>
                <td>&nbsp;&nbsp;<?php echo number_format($tranc->saldo, 2);?></td>
                <?php }?>
                <td><?php echo number_format($curr_saldo, 2); ?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </body>
</html>