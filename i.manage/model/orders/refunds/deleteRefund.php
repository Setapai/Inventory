<?php
session_start();
include_once('../../../services/db.php');
database();
global $con;

  // refundID
  $id = $_POST['id'];

  $updateProd ="SELECT
  refund.oID AS oID,
  products.id AS prodID,
  refund.qty AS rqty,
  (products.qty + refund.qty) AS sumVal
  FROM order_records
  INNER JOIN refund ON refund.order_recID = order_records.id
  INNER JOIN products ON products.id = refund.prodID
  WHERE refund.id = '$id'  ";
  $q = $con->query($updateProd);
  $getProds = $q->fetchAll(PDO::FETCH_ASSOC);

  foreach ($getProds as $get) {
    $prodID = $get['prodID'];
    $sum = $get['sumVal'];
    $oid = $get['oID'];
    $rqty = $get['rqty'];
    $call = "UPDATE products SET qty = '$sum' WHERE id = '$prodID' ";
    $q = $con->query($call);
  }
    // CALL
    // $getOrders ="SELECT * FROM orders WHERE id = '$oid'  ";
    // $q = $con->query($getOrders);
    // $getOrders = $q->fetchAll(PDO::FETCH_ASSOC);
    // foreach ($getOrders as $value) {
    //   $newOrdersQty = $value['qty'] + $rqty;
    // }
    // $call = "UPDATE orders SET qty = '$newOrdersQty' WHERE id = '$oid' ";
    // $q = $con->query($call);

  $sql = "DELETE FROM refund WHERE id = '$id'  ";
  $q = $con->query($sql);

 ?>
