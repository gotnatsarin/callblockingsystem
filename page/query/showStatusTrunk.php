<?php 
$output=null;
$retval=null;
exec('sudo asterisk -rx "pjsip show aors"', $output, $retval);
echo json_encode($output,JSON_UNESCAPED_UNICODE);
?>