<?php
include_once('../../services/db.php');
database();
global $con;

$sql = "SELECT
(SUM(orders.price * qty) - SUM(orders.wprice * qty)) AS total,
DATE_FORMAT(date, '%d') AS curdate
FROM orders INNER JOIN order_records ON order_records.id	=	orders.order_recID
WHERE MONTH(date) = MONTH(CURRENT_DATE())
AND YEAR(date) = YEAR(CURRENT_DATE()) AND order_records.loan_status != 'Loan' GROUP BY DATE_FORMAT(date, '%d')
ORDER BY  DATE_FORMAT(date, '%d')
";
$q= $con->query($sql);
$data = $q->fetchAll(PDO::FETCH_ASSOC);



$getDiscount = "SELECT
SUM(discount) AS disc
FROM order_records
WHERE MONTH(date) = MONTH(CURRENT_DATE())
AND YEAR(date) = YEAR(CURRENT_DATE()) AND order_records.loan_status != 'Loan' GROUP BY DATE_FORMAT(date, '%d')
ORDER BY  DATE_FORMAT(date, '%d')";
$q= $con->query($getDiscount);
$getDisc = $q->fetchAll(PDO::FETCH_ASSOC);
array_push($data, $getDisc);



echo json_encode($data);
?>
