<?php
session_start();
include_once('../../services/db.php');
database();
global $con;

    $id = $_POST['getid'];
    $qty = $_POST['qty'];
    $date = date('Y-m-d H:i:s');
    $cashierName = empty($_SESSION['fullname'])? 'CashierNotFound' : $_SESSION['fullname'];

    $call = "UPDATE products SET qty  = '$qty',updatedBy ='$cashierName',lastUpdate = '$date' WHERE id = '$id' ";
    $q = $con->query($call);
 ?>
