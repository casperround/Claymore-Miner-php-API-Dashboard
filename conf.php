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
?>