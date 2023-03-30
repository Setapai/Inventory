<?php
include_once('../../services/db.php');
database();
global $con;

$sql = "
SELECT
(SUM(orders.price * qty) - SUM(orders.wprice * qty)) AS total,
DATE_FORMAT(date, '%M') AS curdate
FROM orders INNER JOIN order_records	ON order_records.id	=	orders.order_recID
";
if($_POST['query'] != '')
{
  $text = $_POST['query'];
  $sql .="
    WHERE YEAR(date) = '$text' AND order_records.loan_status != 'Loan'
  ";
}else {
  $sql .="
    WHERE YEAR(date) = YEAR(CURDATE()) AND order_records.loan_status != 'Loan'
  ";
}

$sql .="
GROUP BY DATE_FORMAT(date, '%M')
";
$q= $con->query($sql);
$data = $q->fetchAll(PDO::FETCH_ASSOC);

//gedsicount

$getDiscount = "
SELECT
SUM(discount) AS disc
FROM order_records
WHERE  order_records.loan_status != 'Loan'
";
if($_POST['query'] != '')
{
  $text = $_POST['query'];
  $getDiscount .="
    AND YEAR(date) = '$text'
  ";
}else {
  $getDiscount .="
     AND YEAR(date) = YEAR(CURDATE())
  ";
}
$getDiscount .="
GROUP BY DATE_FORMAT(date, '%M')
";

$q= $con->query($getDiscount);
$getDisc = $q->fetchAll(PDO::FETCH_ASSOC);
array_push($data, $getDisc);


echo json_encode($data);
?>
