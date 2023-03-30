<?php
include_once('../../services/db.php');
database();
global $con;


  $call = "SELECT SUM(wprice * qty) AS maxDiscount FROM orders_dummy";
  $q = $con->query($call);
  $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
  $rowCount = $q->rowCount();
    foreach ($fetch as $value) {
      if ($value['maxDiscount'] == null) {
        echo "0";
      }else {
        $disTotal = $value['maxDiscount'];
        echo round($disTotal);
      }
  }

 ?>
