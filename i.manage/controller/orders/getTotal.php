<?php
include_once('../../services/db.php');
database();
global $con;

  $dis = $_POST['discount'] ?? '';


  $call = "SELECT SUM((price * qty)) AS total FROM orders_dummy";
  $q = $con->query($call);
  $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
  $rowCount = $q->rowCount();
    foreach ($fetch as $value) {
      if ($value['total'] == null) {
        echo "0";
      }else {
        if (empty($dis)) {
          echo $value['total'];
        }else {
          $disTotal = $value['total'] - $dis;
          echo round($disTotal);
        }

      }
  }

 ?>
