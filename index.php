
<!DOCTYPE html><html lang='en' class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/nikazawila/pen/hmyrz" />

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
<style class="cp-pen-styles">@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

/* --------------------CSS----------------- */

body {
  background: #222;
  font: 16px 'Open Sans', sans-serif;
  padding:30px;
}

.box span{
  font-family: 'Lato', sans-serif;
  font-weight: 300;
  font-size: 20px;
  position: absolute;
}

.box span:nth-child(2){
  top: 2px;
  left: 125px;
}

.box span:nth-child(7){
  top: 85px;
  left: 125px;
}

.box span:nth-child(12){
  top: 165px;
  left: 125px;
}

.server{
  width: 110px;
  height: 30px;
  background: #3a3a3a;
  border-radius: 1px;
}

.server ul{
  margin: 0;
  padding: 0;
  list-style: none;
}

.server:first-child ul li{
  width: 6px;
  height: 6px;
  float: left;
  margin-left: 10px;
  margin-top: 12px;
  background: rgba(149,244,118,0.6);
}

.server ul li:first-child{
  -webkit-animation: pattern1 0.14s linear infinite;
}

.server ul li:nth-child(2){
  -webkit-animation: pattern1 0.14s 0.02s linear infinite;
}

.server ul li:last-child{
  -webkit-animation: pattern1 0.14s 0.05s linear infinite;
}

@-webkit-keyframes pattern1{
  0%{
    background: rgba(149,244,118,0.6);
  }
  100%{
    background: rgba(149,244,118,1);
  }
}

.warning ul li{
  width: 6px;
  height: 6px;
  float: left;
  margin-left: 10px;
  margin-top: 12px;
  background: rgba(245,190,0,0.6);
}

.warning ul li:first-child{
  -webkit-animation: pattern2 0.14s linear infinite;
}

.warning ul li:nth-child(2){
  -webkit-animation: pattern2 0.14s 0.02s linear infinite;
}

.warning ul li:last-child{
  -webkit-animation: pattern2 0.14s 0.05s linear infinite;
}

@-webkit-keyframes pattern2{
  0%{
    background: rgba(245,190,0,0.6);
  }
  100%{
    background: rgba(245,190,0,1);
  }
}

.error ul li{
  width: 6px;
  height: 6px;
  float: left;
  margin-left: 10px;
  margin-top: 12px;
  background: rgba(236,69,62,0.6);
}

.error ul li:first-child{
  -webkit-animation: pattern3 0.9s linear infinite;
}

.error ul li:nth-child(2){
  -webkit-animation: pattern3 0.9s linear infinite;
}

.error ul li:last-child{
  -webkit-animation: pattern3 0.9s linear infinite;
}

@-webkit-keyframes pattern3{
  0%{
    background: rgba(236,69,62,0.6);
  }
  80%{
    background: rgba(236,69,62,0.6);
  }
  100%{
    background: rgba(236,69,62,1);
  }
}
.box {
  background: linear-gradient(#526494, #604484);
  position:relative;
  display:inline-block;
  border-radius: 5px;
  width: 300px;
}

.box__header {
  padding: 15px 25px;
  position: relative;
}

.box__header-title {
  color: #fff;
  font-size: 15px;
}

.box__body {
  padding: 0 25px;
}

/* STATS */

.stats {
  color: #fff;
  position: relative;
  padding-bottom: 25px;
}

.stats__amount {
  font-size: 15px;
  font-weight: bold;
  line-height: 1.2;
}

.stats__caption {
  font-size: 15px;

}

.stats__change {
  position: absolute;
  top: 10px;
  right: 0;
  text-align: right;
  color: #B1B7C8;
}

.stats__value {
  font-size: 15px;
}

.stats__period {
  font-size: 14px;
}

.stats__value--positive {
  color: #AEDC6F;
}

.stats__value--negative {
  color: #FB5055;
}

.stats--main .stats__amount {
  font-size: 54px;
}</style></head><body>


<?php




include('conf.php');





if ($fp1 = fsockopen($mine1_ip,$port,$errCode,$errStr,$waitTimeoutInSeconds)) {
  $socket1 = fsockopen($mine1_ip, $port, $errno, $errstr); 
  fputs($socket1, $data); 
  $buffer1 = ""; 
    while(!feof($socket1)) 
    { 
        $buffer1 .=fgets($socket1, $port); 
    } 
  $character = json_decode($buffer1);
    $mine1_pool = array_slice($character->result, 7, 8);
    $mine1_pool = $mine1_pool[0];
  $mine1_temp = array_slice($character->result, 6, 8);
  $mine1_temp = $mine1_temp[0];
  $mine1_temp = explode(';', $mine1_temp);
  $mine1_uptime = array_slice($character->result, 1, 8);
  $mine1_uptime = $mine1_uptime[0];
  $mine1_temp_ary = array($mine1_temp[0],$mine1_temp[2],$mine1_temp[4],$mine1_temp[6],$mine1_temp[8],$mine1_temp[10]);
  $mine1_temp_av_ = array_sum($mine1_temp_ary) / count($mine1_temp_ary);
  $mine1_temp_av = round($mine1_temp_av_ );
    // - GPU 1 & FAN
    $mine1_temp1 = $mine1_temp[0];
    $mine1_fan1 = $mine1_temp[1];
    // - GPU 2 & FAN
    $mine1_temp2 = $mine1_temp[2];
    $mine1_fan2 = $mine1_temp[3];
    // - GPU 3 & FAN
    $mine1_temp3 = $mine1_temp[4];
    $mine1_fan3 = $mine1_temp[5];
    // - GPU 4 & FAN
    $mine1_temp4 = $mine1_temp[6];
    $mine1_fan4 = $mine1_temp[7];
    // - GPU 5 & FAN
    $mine1_temp5 = $mine1_temp[8];
    $mine1_fan5 = $mine1_temp[9];
    // - GPU 6 & FAN
    $mine1_temp6 = $mine1_temp[10];
    $mine1_fan6 = $mine1_temp[11];
  // - Miner Hash Rates (Hashes - Not Mh/s - Hence the calculations down below)
  $mine1_hash = array_slice($character->result, 3, 8);
  $mine1_hash = $mine1_hash[0];
  // - Seperate the hashes via ';'
  $mine1_hash = explode(';', $mine1_hash);
    // - GPU 1 Hash rate (H/s)
    $mine1_hash1 = round($mine1_hash[0] * (1/1024),2);
    // - GPU 2 Hash rate (H/s)
    $mine1_hash2 = round($mine1_hash[1] * (1/1024),2);
    // - GPU 3 Hash rate (H/s)
    $mine1_hash3 = round($mine1_hash[2] * (1/1024),2);
    // - GPU 4 Hash rate (H/s)
    $mine1_hash4 = round($mine1_hash[3] * (1/1024),2);
    // - GPU 5 Hash rate (H/s)
    $mine1_hash5 = round($mine1_hash[4] * (1/1024),2);
    // - GPU 6 Hash rate (H/s)
    $mine1_hash6 = round($mine1_hash[5] * (1/1024),2);
// - Close the socket for the RPC Telnet of miner1
fclose($socket1); 
}


if ($fp1 = fsockopen($mine2_ip,$port,$errCode,$errStr,$waitTimeoutInSeconds)) {
$socket2 = fsockopen($mine2_ip, $port, $errno, $errstr); 
fputs($socket2, $data); 
  $buffer2 = ""; 
    while(!feof($socket2)) 
    { 
        $buffer2 .=fgets($socket2, $port); 
    } 
  $character = json_decode($buffer2);
    $mine2_pool = array_slice($character->result, 7, 8);
    $mine2_pool = $mine2_pool[0];
  $mine2_temp = array_slice($character->result, 6, 8);
  $mine2_temp = $mine2_temp[0];
  $mine2_temp = explode(';', $mine2_temp);
  $mine2_uptime = array_slice($character->result, 1, 8);
  $mine2_uptime = $mine2_uptime[0];
  $mine2_temp_ary = array($mine2_temp[0],$mine2_temp[2],$mine2_temp[4],$mine2_temp[6],$mine2_temp[8],$mine2_temp[10]);
  $mine2_temp_av_ = array_sum($mine2_temp_ary) / count($mine2_temp_ary);
  $mine2_temp_av = round($mine2_temp_av_ );
    // - GPU 1 & FAN
    $mine2_temp1 = $mine2_temp[0];
    $mine2_fan1 = $mine2_temp[1];
    // - GPU 2 & FAN
    $mine2_temp2 = $mine2_temp[2];
    $mine2_fan2 = $mine2_temp[3];
    // - GPU 3 & FAN
    $mine2_temp3 = $mine2_temp[4];
    $mine2_fan3 = $mine2_temp[5];
    // - GPU 4 & FAN
    $mine2_temp4 = $mine2_temp[6];
    $mine2_fan4 = $mine2_temp[7];
    // - GPU 5 & FAN
    $mine2_temp5 = $mine2_temp[8];
    $mine2_fan5 = $mine2_temp[9];
    // - GPU 6 & FAN
    $mine2_temp6 = $mine2_temp[10];
    $mine2_fan6 = $mine2_temp[11];
  // - Miner Hash Rates (Hashes - Not Mh/s - Hence the calculations down below)
  $mine2_hash = array_slice($character->result, 3, 8);
  $mine2_hash = $mine2_hash[0];
  // - Seperate the hashes via ';'
  $mine2_hash = explode(';', $mine2_hash);
    // - GPU 1 Hash rate (H/s)
    $mine2_hash1 = round($mine2_hash[0] * (1/1024),2);
    // - GPU 2 Hash rate (H/s)
    $mine2_hash2 = round($mine2_hash[1] * (1/1024),2);
    // - GPU 3 Hash rate (H/s)
    $mine2_hash3 = round($mine2_hash[2] * (1/1024),2);
    // - GPU 4 Hash rate (H/s)
    $mine2_hash4 = round($mine2_hash[3] * (1/1024),2);
    // - GPU 5 Hash rate (H/s)
    $mine2_hash5 = round($mine2_hash[4] * (1/1024),2);
    // - GPU 6 Hash rate (H/s)
    $mine2_hash6 = round($mine2_hash[5] * (1/1024),2);
// - Close the socket for the RPC Telnet of miner1
fclose($socket2); 
}
// END OF SOCKET 2
if ($fp1 = fsockopen($mine3_ip,$port,$errCode,$errStr,$waitTimeoutInSeconds)) {
$socket3 = fsockopen($mine3_ip, $port, $errno, $errstr); 
fputs($socket3, $data); 

  $buffer3 = ""; 
    while(!feof($socket3)) 
    { 
        $buffer3 .=fgets($socket3, $port); 
    } 
  $character = json_decode($buffer3);
    $mine3_pool = array_slice($character->result, 7, 8);
    $mine3_pool = $mine3_pool[0];
  $mine3_temp = array_slice($character->result, 6, 8);
  $mine3_temp = $mine3_temp[0];
  $mine3_temp = explode(';', $mine3_temp);
  $mine3_uptime = array_slice($character->result, 1, 8);
  $mine3_uptime = $mine3_uptime[0];
  $mine3_temp_ary = array($mine3_temp[0],$mine3_temp[2],$mine3_temp[4],$mine3_temp[6],$mine3_temp[8],$mine3_temp[10]);
  $mine3_temp_av_ = array_sum($mine3_temp_ary) / count($mine3_temp_ary);
  $mine3_temp_av = round($mine3_temp_av_ );
    // - GPU 1 & FAN
    $mine3_temp1 = $mine3_temp[0];
    $mine3_fan1 = $mine3_temp[1];
    // - GPU 2 & FAN
    $mine3_temp2 = $mine3_temp[2];
    $mine3_fan2 = $mine3_temp[3];
    // - GPU 3 & FAN
    $mine3_temp3 = $mine3_temp[4];
    $mine3_fan3 = $mine3_temp[5];
    // - GPU 4 & FAN
    $mine3_temp4 = $mine3_temp[6];
    $mine3_fan4 = $mine3_temp[7];
    // - GPU 5 & FAN
    $mine3_temp5 = $mine3_temp[8];
    $mine3_fan5 = $mine3_temp[9];
    // - GPU 6 & FAN
    $mine3_temp6 = $mine3_temp[10];
    $mine3_fan6 = $mine3_temp[11];
  // - Miner Hash Rates (Hashes - Not Mh/s - Hence the calculations down below)
  $mine3_hash = array_slice($character->result, 3, 8);
  $mine3_hash = $mine3_hash[0];
  // - Seperate the hashes via ';'
  $mine3_hash = explode(';', $mine3_hash);
    // - GPU 1 Hash rate (H/s)
    $mine3_hash1 = round($mine3_hash[0] * (1/1024),2);
    // - GPU 2 Hash rate (H/s)
    $mine3_hash2 = round($mine3_hash[1] * (1/1024),2);
    // - GPU 3 Hash rate (H/s)
    $mine3_hash3 = round($mine3_hash[2] * (1/1024),2);
    // - GPU 4 Hash rate (H/s)
    $mine3_hash4 = round($mine3_hash[3] * (1/1024),2);
    // - GPU 5 Hash rate (H/s)
    $mine3_hash5 = round($mine3_hash[4] * (1/1024),2);
    // - GPU 6 Hash rate (H/s)
    $mine3_hash6 = round($mine3_hash[5] * (1/1024),2);
// - Close the socket for the RPC Telnet of miner1
fclose($socket3); 
}
// END OF SOCKET 3
if ($fp1 = fsockopen($mine4_ip,$port,$errCode,$errStr,$waitTimeoutInSeconds)) {
$socket4 = fsockopen($mine4_ip, $port, $errno, $errstr); 
fputs($socket4, $data); 
 $buffer4 = ""; 
    while(!feof($socket4)) 
    { 
        $buffer4 .=fgets($socket4, $port); 
    } 
  $character = json_decode($buffer4);
    $mine4_pool = array_slice($character->result, 7, 8);
    $mine4_pool = $mine4_pool[0];
  $mine4_temp = array_slice($character->result, 6, 8);
  $mine4_temp = $mine4_temp[0];
  $mine4_temp = explode(';', $mine4_temp);
  $mine4_uptime = array_slice($character->result, 1, 8);
  $mine4_uptime = $mine4_uptime[0];
  $mine4_temp_ary = array($mine4_temp[0],$mine4_temp[2],$mine4_temp[4],$mine4_temp[6],$mine4_temp[8],$mine4_temp[10]);
  $mine4_temp_av_ = array_sum($mine4_temp_ary) / count($mine4_temp_ary);
  $mine4_temp_av = round($mine4_temp_av_ );
    // - GPU 1 & FAN
    $mine4_temp1 = $mine4_temp[0];
    $mine4_fan1 = $mine4_temp[1];
    // - GPU 2 & FAN
    $mine4_temp2 = $mine4_temp[2];
    $mine4_fan2 = $mine4_temp[3];
    // - GPU 3 & FAN
    $mine4_temp3 = $mine4_temp[4];
    $mine4_fan3 = $mine4_temp[5];
    // - GPU 4 & FAN
    $mine4_temp4 = $mine4_temp[6];
    $mine4_fan4 = $mine4_temp[7];
    // - GPU 5 & FAN
    $mine4_temp5 = $mine4_temp[8];
    $mine4_fan5 = $mine4_temp[9];
    // - GPU 6 & FAN
    $mine4_temp6 = $mine4_temp[10];
    $mine4_fan6 = $mine4_temp[11];
  // - Miner Hash Rates (Hashes - Not Mh/s - Hence the calculations down below)
  $mine4_hash = array_slice($character->result, 3, 8);
  $mine4_hash = $mine4_hash[0];
  // - Seperate the hashes via ';'
  $mine4_hash = explode(';', $mine4_hash);
    // - GPU 1 Hash rate (H/s)
    $mine4_hash1 = round($mine4_hash[0] * (1/1024),2);
    // - GPU 2 Hash rate (H/s)
    $mine4_hash2 = round($mine4_hash[1] * (1/1024),2);
    // - GPU 3 Hash rate (H/s)
    $mine4_hash3 = round($mine4_hash[2] * (1/1024),2);
    // - GPU 4 Hash rate (H/s)
    $mine4_hash4 = round($mine4_hash[3] * (1/1024),2);
    // - GPU 5 Hash rate (H/s)
    $mine4_hash5 = round($mine4_hash[4] * (1/1024),2);
    // - GPU 6 Hash rate (H/s)
    $mine4_hash6 = round($mine4_hash[5] * (1/1024),2);
// - Close the socket for the RPC Telnet of miner1
fclose($socket4); 
// END OF SOCKET 4
}



$global_hash = $mine31_hash1 + $mine1_hash2 + $mine1_hash3 + $mine1_hash4 + $mine1_hash5 + $mine1_hash6 + $mine2_hash1 + $mine2_hash2 + $mine2_hash3 + $mine2_hash4 + $mine2_hash5 + $mine2_hash6 + $mine3_hash1 + $mine3_hash2 + $mine3_hash3 + $mine3_hash4 + $mine3_hash5 + $mine3_hash6 + $mine4_hash1 + $mine4_hash2 + $mine4_hash3 + $mine4_hash4 + $mine4_hash5 + $mine4_hash6;
?> 
<!-- STATS 1 -->
  
<div class="box">
  <div class="box__header">

   <?php if ($fp1 = fsockopen($mine1_ip,$port,$errCode,$errStr,$waitTimeoutInSeconds)) { ?>
    <div class="server">
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
    </div>
   <?php } elseif ($fp1 = fsockopen($mine1_ip,'80',$errCode,$errStr,$waitTimeoutInSeconds)) { ?>
<div class="server warning">
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
   <?php } else { ?>
<div class="server error">
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <?php } ?>

  </div>
  <div class="box__body">
    <div class="stats stats--main">
      <div class="stats__amount">1</div>
      <div class="stats__change">
        <div class="stats__value stats__value--positive">Uptime</div>
        <div class="stats__period"><?=$mine1_uptime?> Mins</div>
      </div>
    </div>

    <div class="stats">
      <div class="stats__amount">Pool</div>
      <div class="stats__caption"><?=$mine1_pool?></div>
    </div>

    <div class="stats">
      <div class="stats__amount">GPU Temp / Fan %</div>
      <div class="stats__caption"><?=$mine1_temp1?>c (<?=$mine1_fan1?>%)<br/> <?=$mine1_temp2?>c (<?=$mine1_fan2?>%)<br/><?=$mine1_temp3?>c (<?=$mine1_fan3?>%)<br/><?=$mine1_temp4?>c (<?=$mine1_fan4?>%)<br/><?=$mine1_temp5?>c (<?=$mine1_fan5?>%)<br/><?=$mine1_temp6?>c (<?=$mine1_fan6?>%)  </div>
    </div>
<?php
$minehash1 = $mine1_hash1 + $mine1_hash2 + $mine1_hash3 + $mine1_hash4 + $mine1_hash5 + $mine1_hash6;
?>
    <div class="stats">
      <div class="stats__amount">Hashrate <?=$mine1_hash1 + $mine1_hash2 + $mine1_hash3 + $mine1_hash4 + $mine1_hash5 + $mine1_hash6?> Mh/s</div>
      <div class="stats__caption"><?=$mine1_hash1?> Mh/s<br/><?=$mine1_hash2?> Mh/s<br/><?=$mine1_hash3?> Mh/s<br/><?=$mine1_hash4?> Mh/s<br/><?=$mine1_hash5?> Mh/s<br/><?=$mine1_hash6?> Mh/s<br/></div>
    </div>
  </div>
</div>

<!-- STATS 2-->
<div class="box" style="position: relative;display: inline-block;">
  <div class="box__header">
   
  <?php if ($fp1 = fsockopen($mine2_ip,$port,$errCode,$errStr,$waitTimeoutInSeconds)) { ?>
    <div class="server">
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
    </div>
   <?php } elseif ($fp1 = fsockopen($mine2_ip,'80',$errCode,$errStr,$waitTimeoutInSeconds)) { ?>
<div class="server warning">
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
   <?php } else { ?>
<div class="server error">
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <?php } ?>

  </div>
  <div class="box__body">
    <div class="stats stats--main">
      <div class="stats__amount">2</div>
      <div class="stats__change">
        <div class="stats__value stats__value--positive">Uptime</div>
        <div class="stats__period"><?=$mine2_uptime?> Mins</div>
      </div>
    </div>

    <div class="stats">
      <div class="stats__amount">Pool</div>
      <div class="stats__caption"><?=$mine2_pool?></div>
    </div>

    <div class="stats">
      <div class="stats__amount">GPU Temp / Fan %</div>
      <div class="stats__caption"><?=$mine2_temp1?>c (<?=$mine2_fan1?>%)<br/> <?=$mine2_temp2?>c (<?=$mine2_fan2?>%)<br/><?=$mine2_temp3?>c (<?=$mine2_fan3?>%)<br/><?=$mine2_temp4?>c (<?=$mine2_fan4?>%)<br/><?=$mine2_temp5?>c (<?=$mine2_fan5?>%)<br/><?=$mine2_temp6?>c (<?=$mine2_fan6?>%)  </div>
    </div>

    <div class="stats">
      <div class="stats__amount">Hashrate <?=$mine2_hash1 + $mine2_hash2 + $mine2_hash3 + $mine2_hash4 + $mine2_hash5 + $mine2_hash6?> Mh/s</div>
      <div class="stats__caption"><?=$mine2_hash1?> Mh/s<br/><?=$mine2_hash2?> Mh/s<br/><?=$mine2_hash3?> Mh/s<br/><?=$mine2_hash4?> Mh/s<br/><?=$mine2_hash5?> Mh/s<br/><?=$mine2_hash6?> Mh/s<br/></div>
    </div>
  </div>
</div>



  
<div class="box" style="position: relative;display: inline-block;">
  <div class="box__header">
   
  <?php if ($fp1 = fsockopen($mine3_ip,$port,$errCode,$errStr,$waitTimeoutInSeconds)) { ?>
    <div class="server">
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
    </div>
   <?php } elseif ($fp1 = fsockopen($mine3_ip,'80',$errCode,$errStr,$waitTimeoutInSeconds)) { ?>
<div class="server warning">
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
   <?php } else { ?>
<div class="server error">
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <?php } ?>
  </div>
  <div class="box__body">
    <div class="stats stats--main">
      <div class="stats__amount">3</div>
      <div class="stats__change">
        <div class="stats__value stats__value--positive">Uptime</div>
        <div class="stats__period"><?=$mine3_uptime?> Mins</div>
      </div>
    </div>

    <div class="stats">
      <div class="stats__amount">Pool</div>
      <div class="stats__caption"><?=$mine3_pool?></div>
    </div>

    <div class="stats">
      <div class="stats__amount">GPU Temp / Fan %</div>
      <div class="stats__caption"><?=$mine3_temp1?>c (<?=$mine3_fan1?>%)<br/> <?=$mine3_temp2?>c (<?=$mine3_fan2?>%)<br/><?=$mine3_temp3?>c (<?=$mine3_fan3?>%)<br/><?=$mine3_temp4?>c (<?=$mine3_fan4?>%)<br/><?=$mine3_temp5?>c (<?=$mine3_fan5?>%)<br/><?=$mine3_temp6?>c (<?=$mine3_fan6?>%)  </div>
    </div>

    <div class="stats">
      <div class="stats__amount">Hashrate <?=$mine3_hash1 + $mine3_hash2 + $mine3_hash3 + $mine3_hash4 + $mine3_hash5 + $mine3_hash6?> Mh/s</div>
      <div class="stats__caption"><?=$mine3_hash1?> Mh/s<br/><?=$mine3_hash2?> Mh/s<br/><?=$mine3_hash3?> Mh/s<br/><?=$mine3_hash4?> Mh/s<br/><?=$mine3_hash5?> Mh/s<br/><?=$mine3_hash6?> Mh/s<br/></div>
    </div>
  </div>
</div>




<div class="box" style="position: relative;display: inline-block;">
     <div class="box__header">
  <?php if ($fp1 = fsockopen($mine4_ip,$port,$errCode,$errStr,$waitTimeoutInSeconds)) { ?>
    <div class="server">
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
    </div>
   <?php } elseif ($fp1 = fsockopen($mine4_ip,'80',$errCode,$errStr,$waitTimeoutInSeconds)) { ?>
<div class="server warning">
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
   <?php } else { ?>
<div class="server error">
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <?php } ?>

  </div>
  <div class="box__body">
    <div class="stats stats--main">
      <div class="stats__amount">4</div>
      <div class="stats__change">
        <div class="stats__value stats__value--positive">Uptime</div>
        <div class="stats__period"><?=$mine4_uptime?> Mins</div>
      </div>
    </div>

    <div class="stats">
      <div class="stats__amount">Pool</div>
      <div class="stats__caption"><?=$mine4_pool?></div>
    </div>

    <div class="stats">
      <div class="stats__amount">GPU Temp / Fan %</div>
      <div class="stats__caption"><?=$mine4_temp1?>c (<?=$mine4_fan1?>%)<br/> <?=$mine4_temp2?>c (<?=$mine4_fan2?>%)<br/><?=$mine4_temp3?>c (<?=$mine4_fan3?>%)<br/><?=$mine4_temp4?>c (<?=$mine4_fan4?>%)<br/><?=$mine4_temp5?>c (<?=$mine4_fan5?>%)<br/><?=$mine4_temp6?>c (<?=$mine4_fan6?>%)  </div>
    </div>

    <div class="stats">
      <div class="stats__amount">Hashrate <?=$mine4_hash1 + $mine4_hash2 + $mine4_hash3 + $mine4_hash4 + $mine4_hash5 + $mine4_hash6?> Mh/s</div>
      <div class="stats__caption"><?=$mine4_hash1?> Mh/s<br/><?=$mine4_hash2?> Mh/s<br/><?=$mine4_hash3?> Mh/s<br/><?=$mine4_hash4?> Mh/s<br/><?=$mine4_hash5?> Mh/s<br/><?=$mine4_hash6?> Mh/s<br/></div>
    </div>
  </div>
</div>




<div class="box" style="position: relative;display: inline-block;">
  <div class="box__header">
  </div>
  <div class="box__body">
    <div class="stats stats--main">
      <div class="stats__amount">Farm</div>
      <div class="stats__caption">Stats</div>
      <div class="stats__change">
        <div class="stats__value stats__value--positive">Uptime</div>
        <div class="stats__period">1) <?=$mine1_uptime?> Mins</div>
        <div class="stats__period">2) <?=$mine2_uptime?> Mins</div>
        <div class="stats__period">3) <?=$mine3_uptime?> Mins</div>
        <div class="stats__period">4) <?=$mine4_uptime?> Mins</div>
      </div>
    </div>

    <div class="stats">
      <div class="stats__amount">Pool</div>
      <div class="stats__caption">1) <?=$mine1_pool?></div>
      <div class="stats__caption">2) <?=$mine2_pool?></div>
      <div class="stats__caption">3) <?=$mine3_pool?></div>
      <div class="stats__caption">4) <?=$mine4_pool?></div>
    </div>

    <div class="stats">
      <div class="stats__amount">Miner Average Temp</div>
      <div class="stats__caption">1) <?=$mine1_temp_av?>c<br/>2) <?=$mine2_temp_av?>c<br/>3) <?=$mine3_temp_av?>c<br/>4) <?=$mine4_temp_av?>c</div>
    </div>

    <div class="stats">
      <div class="stats__amount">Hashrate</div>
      <div class="stats__caption"><?=$global_hash?> Mh/s<br/></div>
    </div>
  </div>
</div>


</body></html>
