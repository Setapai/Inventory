<?php
include_once('../../services/db.php');
database();
global $con;

$sql = "
SELECT
SUM(orders.price * orders.qty) AS rprice,
SUM(orders.wprice * orders.qty) AS wprice,
DATE_FORMAT(date, '%Y') AS curdate
FROM orders INNER JOIN order_records	ON order_records.id	=	orders.order_recID
WHERE  order_records.loan_status != 'Loan'
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

// sum all loans
$loans = "
 SELECT SUM(payments) AS sumLoans
FROM loans INNER JOIN order_records	ON order_records.id	=	loans.order_recID
WHERE order_records.loan_status = 'Loan'
";

if($_POST['yearSelectTotal'] != '')
{
  $text = $_POST['yearSelectTotal'];
  $loans .="
    AND YEAR(date) = '$text'
  ";
}else {
  $loans .="
     AND YEAR(date) = YEAR(CURDATE())
  ";
}

$q= $con->query($loans);
$fetchloans = $q->fetchAll(PDO::FETCH_ASSOC);

foreach ($fetchloans as $value) {
  $sumLoans = empty($value['sumLoans']) ? 0: $value['sumLoans'];
}

//gedsicount

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

if ($rowCount > 0) {
  foreach ($data as $value) {
    $final = ($value['rprice']  - $value['wprice']) -  $disc;
    ?>
    <div class="row justify-content-center align-items-center h-50 mt-5 text-center">
      <div class="col-12">
        <h4>Total Income This Year</h4>
      </div>
      <div class="col-12 ">
        <h1 class=""><?php echo Floor($final +  $sumLoans) ?> ₱</h1>
      </div>
    </div>
    <?php
  }
}else {
  foreach ($data as $value) {
    $newTotal = empty($value['rprice'] && $value['wprice']?0:1);
  }
  ?>
  <div class="row justify-content-center align-items-center h-50 mt-5 text-center">
    <div class="col-12">
      <h4>Total Income This Year</h4>
    </div>
    <div class="col-12 ">
      <h1 class=""><?php echo Floor($newTotal +  $sumLoans) ?> ₱</h1>
    </div>
  </div>
  <?php
}

?>
