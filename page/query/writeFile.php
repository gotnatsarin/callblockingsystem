<?php
$inbound = $_POST['inbound'];
$outbound = $_POST['outbound'];
$portIn = $_POST['portIn'];
$portOut = $_POST['portOut'];
$output_in = null;
$retval_in = null;
$output_out = null;
$retval_out = null;
$exeScript1 = null;
$retval_script1 = null;
$exeScript2 = null;
$retval_script2 = null;

$txt_in = "
[inboundtrunk]
type=endpoint
transport=transport-udp
context=from-internal
disallow=all
allow=ulaw
allow=alaw
outbound_auth=inboundtrunk_auth
aors=inboundtrunk
rtp_symmetric=yes
force_rport=yes
direct_media=yes
ice_support=yes

[inboundtrunk]
type=aor
contact=sip:$inbound:$portIn

[inboundtrunk]
type=identify
endpoint=inboundtrunk
match=$inbound
";

$txt_out = "
[outboundtrunk]
type=endpoint
transport=transport-udp
context=from-external
disallow=all
allow=ulaw
allow=alaw
outbound_auth=outboundtrunk_auth
aors=outboundtrunk
rtp_symmetric=yes
force_rport=yes
direct_media=yes
ice_support=yes

[outboundtrunk]
type=aor
contact=sip:$outbound:$portOut

[outboundtrunk]
type=identify
endpoint=outboundtrunk
match=$outbound
";

exec("echo '$txt_in' > /etc/asterisk/pjsip_inbound.conf",$output_in,$retval_in);
exec("echo '$txt_out' > /etc/asterisk/pjsip_outbound.conf",$output_out,$retval_out);
exec('sudo asterisk -rx "dialplan reload"',$exeScript1,$retval_script1);
exec('sudo asterisk -rx "pjsip reload"',$exeScript2,$retval_script2);
echo $retval_script1 + $retval_script2 + $retval_out + $retval_in;
?>