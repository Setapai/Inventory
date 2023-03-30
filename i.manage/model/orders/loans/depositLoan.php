<?php
session_start();
include_once('../../../services/db.php');
database();
global $con;


    $id = $_POST['id'];
    $newBal = $_POST['newBal'];
    $remBal = $_POST['remBal'];
    $total = $_POST['total'];
    $disTotal = $_POST['disTotal'];
    $date = date('Y-m-d H:i:s');
    $inpassCheck = $_POST['inpassCheck'];
    $cashierName = empty($_SESSION['fullname'])? 'CashierNotFound' : $_SESSION['fullname'];

  if ($inpassCheck == $disTotal) {
    $loans ="INSERT INTO loans
    VALUES(0,'$disTotal', '$total','$newBal', '$date', '$id','$cashierName')";
    $q = $con->query($loans);

    $call = "UPDATE order_records SET loan_status  = 'Inpass',  inpassDate = '$date' WHERE id = '$id' ";
    $q = $con->query($call);

    $call = "UPDATE orders SET loan_status  = 'Inpass'WHERE order_recID = '$id' ";
    $q = $con->query($call);
  }else {
        $loans ="INSERT INTO loans
        VALUES(0,'$disTotal', '$total','$newBal', '$date', '$id','$cashierName')";
        $q = $con->query($loans);
  }





 ?>
