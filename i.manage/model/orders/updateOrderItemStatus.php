<?php
include_once('../../services/db.php');
database();
global $con;



    $id = $_POST['id'];
    $sql ="SELECT * FROM orders_dummy WHERE id = '$id' ";
    $q = $con->query($sql);
    $res = $q->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($res as $value) {
      if ($value['status'] == 'WholeSale') {
        $status = 'Retail';
      }else {
        $status = 'WholeSale';
      }
    }

    $call = "UPDATE orders_dummy SET status  = '$status' WHERE id = '$id' ";
    $q = $con->query($call);


 ?>
