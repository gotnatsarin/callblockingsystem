<?php
$inbound = $_POST['inbound'];
$outbound =$_POST['outbound'];
$portIn = $_POST['portIn'];
$portOut = $_POST['portOut'];

//printf "hello\nddd" > /etc/asterisk/pjsip_trunk.conf

exec("printf '$inpound\n
$outbound\n
$portIn\n
$portOut\n
' > /etc/asterisk/pjsip_trunk.conf");
?>