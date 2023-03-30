<?php
session_start();
include_once('../../../services/db.php');
database();
global $con;

  // refundID
  $id = $_POST['id'];
  $cashierName = empty($_SESSION['fullname'])? 'CashierNotFound' : $_SESSION['fullname'];
  $date = date('Y-m-d H:i:s');

  $sql ="SELECT * FROM refund WHERE id = '$id'  ";
  $q = $con->query($sql);
  $fetch = $q->fetchAll(PDO::FETCH_ASSOC);

  foreach ($fetch as $value) {
    $prodID = $value['prodID'];
    $qty = $value['qty'];
    $desc = $value['note'];
  }

  $copyOrder = "INSERT INTO def_products SELECT 0,'$prodID','$qty','$desc','$date','$cashierName','',null,'def_refund' FROM refund WHERE id = '$id' ";
  $q = $con->query($copyOrder);

  $call = "UPDATE refund SET status  = 'Defective' WHERE id = '$id' ";
  $q = $con->query($call);


 ?>
