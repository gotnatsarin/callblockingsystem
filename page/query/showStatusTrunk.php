<?php 
$cmd = "asterisk -rx 'pjsip show aors'";
exec($cmd,$output);
// print_r($output);
foreach ($output as $key => $value) {
  echo $value."<br>";
}
?>