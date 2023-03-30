<?php
include_once('../../services/db.php');
database();
global $con;

    $id = $_POST['id'];

    $defProd = "SELECT * FROM def_products WHERE id = '$id' ";
    $q = $con->query($defProd);
    $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
    foreach ($fetch as $value) {
      $curVal = $value['qty'];
      $prodID = $value['prodID'];
    }
    $prod = "SELECT * FROM products WHERE id = '$prodID'  ";
    $q = $con->query($prod);
    $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
    foreach ($fetch as $value) {
      $prodQty = $value['qty'] + $curVal;
    }
    $call = "UPDATE Products SET qty  = '$prodQty' WHERE id = '$prodID' ";
    $q = $con->query($call);

    $sql = "DELETE FROM def_products WHERE id = '$id'";
    $q = $con->query($sql);

 ?>
