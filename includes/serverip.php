<?php
    
   $res = shell_exec("ifconfig wlp5s0");
   $sanitizedRes = strstr($res, 'inet ');
   $sanitizedRes = strstr($sanitizedRes, 'netmask ', true);
   $explodedSanitized = explode(' ',$sanitizedRes);
   echo $explodedSanitized[1];

?>