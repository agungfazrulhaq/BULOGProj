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
            <tbody>
            <?php foreach($transaksi as $tranc){ ?>
            <tr>
                <td><?php echo $tranc->tanggal; ?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </body>
</html>