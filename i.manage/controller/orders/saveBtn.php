<?php
  include_once('../../services/db.php');
  database();
  global $con;


  $call = "SELECT * FROM orders_dummy ";
  $q = $con->query($call);
  $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
  $rowCount = $q->rowCount();
  if($rowCount > 0){
    echo '
    <button type="submit" name="saveOrder" value="mayUnodKo" class="btn btn-info float-right">Create Order
    <i class="bi bi-bag-check"></i></button>
    ';
  }else {
    echo '
    <button id="saveOrderBtn" type="submit" value="mayUnodKo" name="saveOrder"
    class="btn btn-dark  float-right" disabled>Create Order  <i class="bi bi-bag-check"></i></button>
    ';
  }

 ?>
