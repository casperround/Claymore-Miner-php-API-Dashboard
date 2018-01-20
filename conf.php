<?php
// - Hostname for machine running PHP/Web interface
$host='raspberrypi';
// -Farm Machines (Ip or Hostname)
$mine1_ip="miner1";
$mine2_ip="miner2";
$mine3_ip="miner3";
$mine4_ip="miner4";
// - Global port for all machines (Claymore uses port 3333)
$port="3333";
// - Json Data for Claymore's Telnet API
$data='{"id":0,"jsonrpc":"2.0","method":"miner_getstat1"} \r\n';



$waitTimeoutInSeconds = 1; 
// check server 1
if($fp1 = fsockopen($mine1_ip,$port,$errCode,$errStr,$waitTimeoutInSeconds)){   
   $status1='1';
} elseif($fp1 = fsockopen($mine1_ip,'80',$errCode,$errStr,$waitTimeoutInSeconds)){   
   $status1='2';
} else {
   $status1='3';
}
fclose($fp1);
// check server 2
if($fp2 = fsockopen($mine2_ip,$port,$errCode,$errStr,$waitTimeoutInSeconds)){   
   $status2='1';
} elseif($fp2 = fsockopen($mine2_ip,'80',$errCode,$errStr,$waitTimeoutInSeconds)){   
   $status2='2';
} else {
   $status2='3';
}
fclose($fp2);
// check server 3
if($fp3 = fsockopen($mine3_ip,$port,$errCode,$errStr,$waitTimeoutInSeconds)){   
   $status3='1';
} elseif($fp3 = fsockopen($mine3_ip,'80',$errCode,$errStr,$waitTimeoutInSeconds)){   
   $status3='2';
} else {
   $status3='3';
}
fclose($fp3);
// check server 4
if($fp4 = fsockopen($mine4_ip,$port,$errCode,$errStr,$waitTimeoutInSeconds)){   
   $status4='1';
} elseif($fp4 = fsockopen($mine4_ip,'80',$errCode,$errStr,$waitTimeoutInSeconds)){   
   $status4='2';
} else {
   $status4='3';
}
fclose($fp4);


?>