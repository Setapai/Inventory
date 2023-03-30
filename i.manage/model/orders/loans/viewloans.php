<?php
include_once('../services/db.php');
database();

  function viewLoans(){
    global $con;

      if (empty($_SESSION['orderRecID'])) {
        $orID = $_POST['viewLoans'];
        $_SESSION['orderRecID'] = $orID;
      }else {
        $orID = $_SESSION['orderRecID'];
      }

      $sql ="SELECT
      order_records.id,
      order_records.receipt,
      order_records.name,
      order_records.pnum,
      order_records.date,
      order_records.discount,
      order_records.date,
      order_records.loan_status,
      DATE(order_records.inpassDate) AS inDate,
      loans.total AS totalprice,
      loans.discountedTotal AS discTotal,
      SUM(loans.payments) AS balance,
      (loans.discountedTotal - SUM(loans.payments)) AS remBalanace
      FROM order_records
      INNER JOIN loans ON	order_records.id = loans.order_recID
      WHERE order_records.id = '$orID'
      GROUP BY loans.Total,loans.discountedTotal,order_records.id";

      $q = $con->query($sql);
      $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
      return $fetch;

  }
 ?>
