<?php
include_once('../../services/db.php');
database();
global $con;

$sql = "SELECT
SUM(orders.price * orders.qty) AS rprice,
SUM(orders.wprice * orders.qty) AS wprice
FROM orders INNER JOIN order_records ON order_records.id	=	orders.order_recID
WHERE MONTH(order_records.date) = MONTH(CURRENT_DATE())
AND YEAR(order_records.date) = YEAR(CURRENT_DATE()) AND orders.loan_status != 'Loan' ";
$q= $con->query($sql);
$data = $q->fetchAll(PDO::FETCH_ASSOC);


$getDiscount = "SELECT
SUM(order_records.discount) AS discount
FROM order_records
WHERE YEARWEEK(order_records.date, 1) = YEARWEEK(CURDATE(), 1)
AND order_records.loan_status != 'Loan' ";
$q= $con->query($getDiscount);
$getDisc = $q->fetchAll(PDO::FETCH_ASSOC);

foreach ($getDisc as $value) {
  $disc = $value['discount'];
}

// sum all loans
$loans = "SELECT SUM(payments) AS sumLoans
FROM loans INNER JOIN order_records	ON order_records.id	=	loans.order_recID
WHERE MONTH(loans.dateTime) = MONTH(CURRENT_DATE())
AND YEAR(loans.dateTime) = YEAR(CURRENT_DATE()) AND order_records.loan_status = 'Loan' ";
$q= $con->query($loans);
$fetchloans = $q->fetchAll(PDO::FETCH_ASSOC);

foreach ($fetchloans as $value) {
  $sumLoans = empty($value['sumLoans'])?0:$value['sumLoans'];
}
?>



<?php foreach ($data as $value):
  $final = ($value['rprice']-$value['wprice']) -$disc;
  ?>

  <div class="row justify-content-center align-items-center h-50 mt-5 text-center">
    <div class="col-12">
      <h4>Total Income This Month</h4>
    </div>
    <div class="col-12">
      <h1 class=""><?php echo Floor($final + $sumLoans) ?> ₱</h1>
    </div>
  </div>

<?php endforeach; ?>
