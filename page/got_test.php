<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <?php require('mdb_js.php'); ?>
  <?php require('mdb_css.php'); ?>

  <title>Document</title>
</head>
<body>
  <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
  var xValue = [];
  var username = localStorage.getItem('username');

  console.log(username);

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValue,
    datasets: [{
      // backgroundColor: ,
      data: username
    }]
  },
  options: {
    title: {
      display: true,
      text: "World Wide Wine Production 2018"
    }
  }
});
</script>
</body>

<script src='ajax/list_user.js'></script>
</html>