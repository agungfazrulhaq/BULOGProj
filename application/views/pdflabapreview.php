<!DOCTYPE html>
<head>

<style type="text/css">

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

thead {
  background-color:grey;
}

.tj{
  background-color: #DCDCDC;
}

</style>
</head>
<body>
<?php 
$labarugi = 0;
$labarugi_peraset = array(0,0,0);
$countaset=0;
foreach($aset as $row_as){
    $countaset+=1;
}
?>
<p><b> UB. OPASET DIVRE SULSELBAR <br>
<br>
LAPORAN&emsp;:&emsp;LABA (RUGI)<br>
PERIODE&emsp; :&emsp;01 JANUARI - 31 OKTOBER 2019</b></p>
  <table>
    <thead>
      <tr>
        <th  rowspan="2">NO</th>
        <th style="width:270px;"  rowspan="2">URAIAN</th>
        <?php foreach($aset as $row_aset){?>
        <?php
            $string_aset = $row_aset->nama_aset;
            $arr_aset = explode(' ', trim($string_aset));
            $word_aset = $arr_aset[0];
        ?>
        <th><?php echo $word_aset; ?></th>
        <?php } ?>
        
        <th>TOTAL JUMLAH</th>
      </tr>
      <tr>
      <?php foreach($aset as $row_aset){?>
        <th >(Rp)</th>
      <?php } ?>
        <th >(Rp)</th>
      </tr>
      <tr>
        <th >1</th>
        <th >2</th>
    <?php $count_nums = 3; ?>
    <?php foreach($aset as $row_aset){?>
        <th ><?php echo $count_nums;?></th>
        <?php $count_nums+=1;?>
    <?php } ?>
        <th><?php echo $count_nums;?></th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <?php foreach($aset as $row_aset){?>
            <td></td>
        <?php } ?>
        <td class="tj">&nbsp;</td>
      </tr>
      <?php
      $countpart = 1; 
      foreach($allcat as $row_kat){
            if($row_kat->jenis_laba_rugi == 'kotor'){  
        ?>
      <tr>
        <td class="ram"><b><?php echo $countpart?></b></td>
        <td ><b><?php echo strtoupper($row_kat->nama_kat_lr); ?></b></td>
        <?php foreach($aset as $row_aset){?><td>
            </td>
        <?php } ?>
        <td class="tj"></td>
      </tr>
      <?php 
        $countpart_ = 1;
        foreach($kategori as $row_k){
            if($row_k->id_kat_lr_kat == $row_kat->id_kat_laba_rugi){
        ?>
      <tr>
        <td class="ram"><b><?php echo $countpart?>.<?php echo $countpart_ ?></b></td>
        <?php $countpart_+=1;?>
        <td ><?php echo ucfirst($row_k->nama_kategori); ?></td>
        <?php foreach($aset as $row_aset){?>
            <td>
            <?php
            $rpcount = 0;
            $elem_aset = 0;
            foreach($rpincat as $rp){
                if(($rp->aid == $row_aset->id_aset) and ($rp->kid == $row_k->id_kategori)){
                    echo $rp->rp;
                    if($rp->jenis_transaksi == "DEBIT"){
                        $labarugi+=$rp->rp;
                        $labarugi_peraset[$elem_aset]+=$rp->rp;
                    }
                    else{
                        $labarugi-=$rp->rp;
                        $labarugi_peraset[$elem_aset]-=$rp->rp;
                    }
                    $rpcount = 1;
                }
            }
            if($rpcount == 0){
                echo "-";
            }
            ?>
            </td>
        <?php } ?>
        <td class="tj"></td>
      </tr>
      <?php 
            }
        } 
    ?>
    
    <?php $countpart+=1;?>
      <tr>
        <td >&nbsp;</td>
        <td ><b>Jumlah <?php echo ucwords($row_kat->nama_kat_lr); ?></b></td>
        <?php foreach($aset as $row_aset){?>
            <td></td>
        <?php } ?>
        <td class="tj">&nbsp;</td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <?php foreach($aset as $row_aset){?>
            <td></td>
        <?php } ?>
        <td class="tj">&nbsp;</td>
      </tr>
      <?php 
            }
        } 
        ?>
              <tr>
        <td ></td>
        <td ><b>LABA RUGI KOTOR</b></td>
        <?php $countelem_aset=0;?>
        <?php foreach($aset as $row_aset){?>
            <td><?php echo $labarugi_peraset[$countelem_aset];?></td>
            <?php $countelem_aset+=1;?>
        <?php } ?>
        <td class="tj"></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <?php foreach($aset as $row_aset){?>
            <td></td>
        <?php } ?>
        <td class="tj">&nbsp;</td>
      </tr>
      <?php
      $countpart = 1; 
      foreach($allcat as $row_kat){
            if($row_kat->jenis_laba_rugi == 'usaha'){  
        ?>
      <tr>
        <td class="ram"><b><?php echo $countpart?></b></td>
        <td ><b><?php echo strtoupper($row_kat->nama_kat_lr); ?></b></td>
        <?php foreach($aset as $row_aset){?>
            <td></td>
        <?php } ?>
        <td class="tj"></td>
      </tr>
      <?php 
        $countpart_ = 1;
        foreach($kategori as $row_k){
            if($row_k->id_kat_lr_kat == $row_kat->id_kat_laba_rugi){
        ?>
      <tr>
        <td class="ram"><b><?php echo $countpart?>.<?php echo $countpart_ ?></b></td>
        <?php $countpart_+=1;?>
        <td ><?php echo ucfirst($row_k->nama_kategori); ?></td>
        <?php foreach($aset as $row_aset){?>
            <td>
            <?php
            $rpcount = 0;
            foreach($rpincat as $rp){
                if(($rp->aid == $row_aset->id_aset) and ($rp->kid == $row_k->id_kategori)){
                    echo $rp->rp;
                    if($rp->jenis_transaksi == "DEBIT"){
                        $labarugi+=$rp->rp;
                        $labarugi_peraset[$elem_aset]+=$rp->rp;
                    }
                    else{
                        $labarugi-=$rp->rp;
                        $labarugi_peraset[$elem_aset]-=$rp->rp;
                    }
                    $rpcount = 1;
                }
            }
            if($rpcount == 0){
                echo "-";
            }
            ?>
            </td>
        <?php } ?>
        <td class="tj"></td>
      </tr>
      <?php 
            }
        } 
    ?>
    
    <?php $countpart+=1;?>
      <tr>
        <td >&nbsp;</td>
        <td ><b>Jumlah <?php echo ucwords($row_kat->nama_kat_lr); ?></b></td>
        <?php foreach($aset as $row_aset){?>
            <td></td>
        <?php } ?>
        <td class="tj">&nbsp;</td>
      </tr>
      <tr>
            <td></td>
            <td></td>
      <?php foreach($aset as $row_aset){?>
            <td></td>
        <?php } ?>
        <td class="tj">&nbsp;</td>
      </tr>

      <?php 
            }
        } 
        ?>
              <tr>
        <td ></td>
        <td ><b>LABA RUGI USAHA</b></td>
        <?php $countelem_aset = 0?>
        <?php foreach($aset as $row_aset){?>
            <td><?php echo $labarugi_peraset[$countelem_aset];?></td>
            <?php $countelem_aset+=1;?>
        <?php } ?>
        <td class="tj"></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <?php foreach($aset as $row_aset){?>
            <td></td>
        <?php } ?>
        <td class="tj">&nbsp;</td>
      </tr>
      <?php
      $countpart = 1; 
      foreach($allcat as $row_kat){
            if($row_kat->jenis_laba_rugi == 'lain'){  
        ?>
      <tr>
        <td class="ram"><b><?php echo $countpart?></b></td>
        <td ><b><?php echo strtoupper($row_kat->nama_kat_lr); ?></b></td>
        <?php foreach($aset as $row_aset){?>
            <td></td>
        <?php } ?>
        <td class="tj"></td>
      </tr>
      <?php 
        $countpart_ = 1;
        foreach($kategori as $row_k){
            if($row_k->id_kat_lr_kat == $row_kat->id_kat_laba_rugi){
        ?>
      <tr>
        <td class="ram"><b><?php echo $countpart?>.<?php echo $countpart_ ?></b></td>
        <?php $countpart_+=1;?>
        <td ><?php echo ucfirst($row_k->nama_kategori); ?></td>
        <?php foreach($aset as $row_aset){?>
            <td>
            <?php
            $rpcount = 0;
            foreach($rpincat as $rp){
                if(($rp->aid == $row_aset->id_aset) and ($rp->kid == $row_k->id_kategori)){
                    echo $rp->rp;
                    if($rp->jenis_transaksi == "DEBIT"){
                        $labarugi+=$rp->rp;
                        $labarugi_peraset[$elem_aset]+=$rp->rp;
                    }
                    else{
                        $labarugi-=$rp->rp;
                        $labarugi_peraset[$elem_aset]-=$rp->rp;
                    }
                    $rpcount = 1;
                }
            }
            if($rpcount == 0){
                echo "-";
            }
            ?>
            </td>
        <?php } ?>
        <td class="tj"></td>
      </tr>
      <?php 
            }
        } 
    ?>
      <tr>
        <td >&nbsp;</td>
        <td ><b>Jumlah <?php echo ucwords($row_kat->nama_kat_lr); ?></b></td>
        <?php foreach($aset as $row_aset){?>
            <td></td>
        <?php } ?>
        <td class="tj">&nbsp;</td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td >&nbsp;</td>
        <?php foreach($aset as $row_aset){?>
            <td></td>
        <?php } ?>
        <td class="tj">&nbsp;</td>
      </tr>

      <?php 
            }
        } 
        ?>
      <tr>
        <td class="ram"><b></b></td>
        <td ><b>LABA RUGI</b></td>
        <?php $countelem_aset = 0?>
        <?php foreach($aset as $row_aset){?>
            <td><?php echo $labarugi_peraset[$countelem_aset];?></td>
            <?php $countelem_aset+=1;?>
        <?php } ?>
        <td class="tj"></td>
      </tr>
      <tr>
        <td ></td>
        <td >&nbsp;</td>
        <?php foreach($aset as $row_aset){?>
            <td></td>
        <?php } ?>
        <td class="tj"1></td>
      </tr>

    </tbody>
  </table>
</body>
</html>