<?php 
    include 'phpqrcode/qrlib.php';

    $res = shell_exec("ifconfig wlp5s0");
    $sanitizedRes = strstr($res, 'inet ');
    $sanitizedRes = strstr($sanitizedRes, 'netmask ', true);
    $explodedSanitized = explode(' ',$sanitizedRes);
  


    header('Content-Type:image/png');
    QRcode::png('http://'. $explodedSanitized[1].'/files',null,"H",10,2);

 ?>
