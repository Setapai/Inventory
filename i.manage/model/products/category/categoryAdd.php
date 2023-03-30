<?php
session_start();
include_once('../../../services/db.php');
database();

  global $con;
  $cat = $_POST['category'];
  $cashierName = empty($_SESSION['fullname'])? 'CashierNotFound' : $_SESSION['fullname'];

  try {
    $call = "INSERT INTO category VALUES (0, '$cat','$cashierName')";
    $q = $con->query($call);

    echo '<div id="ErrorHandle" class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <span>A Category Have Been added </span>
    </div>';

  } catch (\Exception $e) {

    echo '<div id="ErrorHandle" class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <span>Failed To add Category : Category Already Exist</span>
    </div>';
  }



 ?>
