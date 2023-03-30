<?php
include_once('../../services/db.php');
database();
global $con;

$sql = "SELECT
(SUM(orders.price * qty) - SUM(orders.wprice * qty)) AS total,
SUM(orders.wprice * orders.qty) AS wtotal,
SUM(orders.price * orders.qty) AS rtotal
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

foreach ($data as $value) {
  $final = ($value['rtotal']-$value['wtotal']) -$disc;
  ?>
  <div class="row text-center">
      <div class="col">
        <h5>Total Retail:
          <span>
            <?php echo number_format($value['rtotal'],2);
             ?> ₱
          </span>
        </h5>
      </div>
      <div class="col">
        <h5>Total WholeSale :
          <span>
            <?php echo number_format($value['wtotal'],2);
             ?> ₱
          </span>
        </h5>
      </div>
  </div>
  <hr>
  <div class="row text-right">
    <div class="col ">
      <h5>Total Discount :
        <span>
          <?php echo number_format($disc,2);
           ?> ₱
        </span>
      </h5>
    </div>
    <div class="col ">
      <h5>Total :
        <span>
          <?php echo number_format($final,2);
           ?> ₱
        </span>
      </h5>
    </div>
  </div>
  <?php
}
?>
