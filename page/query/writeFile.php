<?php
$inbound = $_POST['inbound'];
$outbound =$_POST['outbound'];
$portIn = $_POST['portIn'];
$portOut = $_POST['portOut'];
$output = null;
$retval = null;
$txt = "
InboundTrunkIP : $inbound
InboundPort : 
"
//printf "hello\nddd" > /etc/asterisk/pjsip_trunk.conf

exec("sudo printf 'hello2' > /etc/asterisk/pjsip_trunk.conf",$output);
?>