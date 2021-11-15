<?php require('query/checklogin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require('mdb_js.php'); ?>
    <?php require('mdb_css.php'); ?>

    <title>Command Page</title>
</head>
<body>
    <?php require('components/navbar.php'); ?>
</body>

<script>
    $(document).ready(function() {
    $('#command_page').addClass('active');
    });
</script>

</html>