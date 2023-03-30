<?php
session_start();
include './controller/userControl/login.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Imanage</title>
    <link rel="shortcut icon" href="assets/fav.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/defaults.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <?php
        include './view/login/login.php';
        ?>
      </div>
    </div>
    <!-- Scripts -->
    <script src="js/jquery.min.js" charset="utf-8"></script>
    <script src="js/popper.min.js" charset="utf-8"></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
