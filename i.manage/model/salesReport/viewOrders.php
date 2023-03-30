<?php
include_once('../services/db.php');
database();

function SRviewOrders(){
  global $con;

  if (empty($_SESSION['orderRecID'])) {
    $id = $_POST['SRviewOrder'];
    $_SESSION['orderRecID'] = $id;
    $_SESSION['salesReportReturn'] = 'NIGGA';
  }else {
    $id = $_SESSION['orderRecID'];
  }
  if (!empty($id)) {

    $sql = "SELECT * FROM order_records WHERE id = '$id'  ";
    $q = $con->query($sql);
    $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
    foreach ($fetch as $value) {
      $getStatus = $value['loan_status'];
    }

    if ($getStatus == 'Loan') {
      // GET LOANDS STATUS
      $sql ="SELECT
      order_records.id,
      order_records.receipt,
      order_records.name,
      order_records.pnum,
      order_records.date,
      order_records.discount,
      order_records.date,
      order_records.loan_status,
      order_records.sold_by,
      DATE(order_records.inpassDate) AS inDate,
      loans.total AS totalprice,
      loans.discountedTotal AS discTotal,
      SUM(loans.payments) AS balance,
      (loans.discountedTotal - SUM(loans.payments)) AS remBalanace
      FROM order_records
      INNER JOIN loans ON	order_records.id = loans.order_recID
      WHERE order_records.id = '$id'
      GROUP BY loans.Total,loans.discountedTotal,order_records.id";

      $q = $con->query($sql);
      $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
      return $fetch;
    }else {
      // Get PAID STATUS
      $viewData="SELECT
                a.id,
                a.receipt,
                a.name,
                a.pnum,
                a.date,
                a.discount,
                a.sold_by,
                DATE(a.inpassDate) AS inDate,
                a.loan_status,
                SUM((IF(b.status = 'WholeSale',b.wprice,b.price) * b.qty)-((IF(b.status = 'WholeSale',b.wprice,b.price) * b.qty) * a.discount / 100))
                 AS discTotal,
                    SUM(IF(b.status = 'WholeSale',(b.wprice * b.qty),(b.price * b.qty))) AS totalprice,
                COUNT(b.qty) AS totalItems
                FROM order_records a INNER JOIN orders b
                ON a.id	=	b.order_recID WHERE a.id = '$id'
                GROUP BY a.id, a.name";
        $q = $con->query($viewData);
        $fetchUsers = $q->fetchAll(PDO::FETCH_ASSOC);
        return $fetchUsers;
    }


  }
}

 ?>
