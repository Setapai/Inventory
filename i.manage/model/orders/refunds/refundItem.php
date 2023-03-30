<?php
session_start();
include_once('../../../services/db.php');
database();
global $con;

$id = $_POST['id'];
$qty = $_POST['qty'];
$note =$_POST['note'];
$date = date('Y-m-d H:i:s');
$cashierName = empty($_SESSION['fullname'])? 'CashierNotFound' : $_SESSION['fullname'];

$copyOrder = "INSERT INTO refund SELECT 0,'$id',prodID,'$qty','Refunded','$note',order_recID,'$date','$cashierName'
FROM orders WHERE id = '$id' ";
$q = $con->query($copyOrder);

// CALL
// $getOrders ="SELECT * FROM orders WHERE id = '$id'  ";
// $q = $con->query($getOrders);
// $getOrders = $q->fetchAll(PDO::FETCH_ASSOC);
//
// foreach ($getOrders as $value) {
//   $newOrdersQty = $value['qty'] - $qty;
// }
// $call = "UPDATE orders SET qty = '$newOrdersQty' WHERE id = '$id' ";
// $q = $con->query($call);

// FIX LOGIC ON PRODUCTS
$updateProd ="SELECT
products.id AS prodID,
(products.qty - refund.qty) AS sumVal
FROM order_records
INNER JOIN refund ON refund.order_recID = order_records.id
INNER JOIN products ON products.id = refund.prodID
WHERE refund.oID = '$id'  ";
$q = $con->query($updateProd);
$getProds = $q->fetchAll(PDO::FETCH_ASSOC);

foreach ($getProds as $get) {
  $prodID = $get['prodID'];
  $sum = $get['sumVal'];

  $call = "UPDATE products SET qty = '$sum' WHERE id = '$prodID' ";
  $q = $con->query($call);
}





 ?>
