<?php 
$cmd = "dir";

exec($cmd,$output);
var_dump($output);

// // print_r($output);
// foreach ($output as $key => $value) {
//   echo $value."<br>";
// }
?>