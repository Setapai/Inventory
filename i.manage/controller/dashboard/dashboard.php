<?php
include_once('../services/db.php');
database();

  function fetchDashboardBox(){
    global $con;

    $callProd = "SELECT COUNT(*) AS count FROM products ";
    $q = $con->query($callProd);
    $fetchProd = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach ($fetchProd as$value) {
      $_SESSION['countProd'] = $value['count'];
    }

    $callUsers = "SELECT COUNT(*) AS count FROM users ";
    $q = $con->query($callUsers);
    $fetchUsers = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach ($fetchUsers as $value) {
      $_SESSION['countUsers'] = $value['count'];

    }

    $callOrdersRec = "SELECT COUNT(*) AS count FROM order_records WHERE loan_status != 'Loan' ";
    $q = $con->query($callOrdersRec);
    $fetchOrderRec = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach ($fetchOrderRec as  $value) {
      $_SESSION['countOrders'] = $value['count'];
    }

  }

 ?>
