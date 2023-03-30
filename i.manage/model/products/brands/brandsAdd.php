<?php
session_start();
include_once('../../../services/db.php');
database();

  global $con;

  $brand = $_POST['brands'];
  $cashierName = empty($_SESSION['fullname'])? 'CashierNotFound' : $_SESSION['fullname'];

  try {
    $call = "INSERT INTO brands VALUES (0, '$brand','$cashierName')";
    $q = $con->query($call);

    echo '<div id="ErrorHandle" class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <span>A Brand Have Been added </span>
    </div>';
  } catch (\Exception $e) {
    echo '<div id="ErrorHandle" class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <span>Failed To add Brand : Brand Already Exist</span>
    </div>';
  }



 ?>
