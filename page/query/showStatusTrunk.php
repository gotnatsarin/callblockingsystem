<?php 
$output=null;
$retval=null;
exec('sudo asterisk -rx "pjsip show aors"', $output, $retval);
//echo json_encode($output,JSON_UNESCAPED_UNICODE);

echo '[""," Aor: "," Contact: ","==========================================================================================",""," Aor: 0868789186 1",""," Aor: 0970616129 1",""," Aor: inboundtrunk 0"," Contact: inboundtrunk\/sip:61.47.81.108:5060 5bb2e1a758 NonQual nan",""," Aor: outboundtrunk 0"," Contact: outboundtrunk\/sip:61.47.81.110:5060 562f74178e NonQual nan","","","Objects found: 4",""]';
?>