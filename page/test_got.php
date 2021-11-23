<!DOCTYPE html>
<html>
<head></head>
<body>
<button onclick="Buttontoggle()">Click to Toggle Text</button>

<div id="123">Some Text</div>
</body>
<script type="text/javascript">
function Buttontoggle()
{
  var t = document.getElementById("123");
  if(t.innerHTML=="Some Text"){
      t.innerHTML="Toggled Text";}
  else{
      t.innerHTML="Some Text";}
}
</script>
</html>