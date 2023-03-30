<?php
include_once('../../services/db.php');
database();
global $con;

  $sql = "SELECT
	(SUM(orders.price * qty) - SUM(orders.wprice * qty)) AS total,
  DATE_FORMAT(dateTime, '%M-%a')  AS dateTime
  FROM orders INNER JOIN order_records	ON order_records.id	=	orders.order_recID
  WHERE YEARWEEK(dateTime, 1) = YEARWEEK(CURDATE(), 1) AND orders.loan_status != 'Loan' GROUP BY DATE_FORMAT(dateTime, '%M-%a')";
  $q= $con->query($sql);
  $data = $q->fetchAll(PDO::FETCH_ASSOC);

  $getDiscount = "SELECT
	SUM(discount) AS disc
  FROM order_records
  WHERE YEARWEEK(date, 1) = YEARWEEK(CURDATE(), 1) AND order_records.loan_status != 'Loan' GROUP BY DATE_FORMAT(date, '%M-%a')";
  $q= $con->query($getDiscount);
  $getDisc = $q->fetchAll(PDO::FETCH_ASSOC);
  array_push($data, $getDisc);

  echo json_encode($data);
  ?>
