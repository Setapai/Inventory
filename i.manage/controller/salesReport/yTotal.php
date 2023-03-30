<?php
include_once('../../services/db.php');
database();
global $con;

$sql = "
SELECT
(SUM(orders.price * qty) - SUM(orders.wprice * qty)) AS total,
SUM(orders.wprice * orders.qty) AS wtotal,
SUM(orders.price * orders.qty) AS rtotal,
DATE_FORMAT(date, '%Y') AS curdate
FROM orders INNER JOIN order_records	ON order_records.id	=	orders.order_recID
WHERE  orders.loan_status != 'Loan'
";
if($_POST['yearSelectTotal'] != '')
{
  $text = $_POST['yearSelectTotal'];
  $sql .="
    AND YEAR(date) = '$text'
  ";
}else {
  $sql .="
    AND YEAR(date) = YEAR(CURDATE())
  ";
}

$sql .="
GROUP BY DATE_FORMAT(date, '%Y')
";

$q= $con->query($sql);
$data = $q->fetchAll(PDO::FETCH_ASSOC);
$rowCount = $q->rowCount();

$getDiscount = "
SELECT
SUM(order_records.discount) AS discount
FROM order_records
WHERE  order_records.loan_status != 'Loan'
";
if($_POST['yearSelectTotal'] != '')
{
  $text = $_POST['yearSelectTotal'];
  $getDiscount .="
    AND YEAR(date) = '$text'
  ";
}else {
  $getDiscount .="
     AND YEAR(date) = YEAR(CURDATE())
  ";
}

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
