<?php
session_start();
include_once('../../services/db.php');
database();
global $con;


$sessionID = $_SESSION['orderRecID'];

$sql = "
SELECT
products.product,
products.category,
products.brand,
orders.status,
orders.id AS oID,
order_records.loan_status,
orders.price AS price,
orders.qty
FROM order_records INNER JOIN orders
ON order_records.id	=	orders.order_recID INNER JOIN products ON orders.prodID = products.id WHERE order_records.id = '$sessionID'
";


if(!empty($_POST['query']))
{
  $text = $_POST['query'];
  $sql .= "
    AND product LIKE '%$text%'
  ";
}

$sql .= 'ORDER BY orders.id ASC ';

$statement = $con->query($sql);
$res = $statement->fetchAll(PDO::FETCH_ASSOC);
$rowCount = $statement->rowCount();




foreach($res AS $row) {
  if ($rowCount > 0) {
      $ordersQty = $row['qty'];
      $oid = $row['oID'];
      $refundSql = "SELECT SUM(qty) AS rQty FROM refund WHERE oID = '$oid'  ";
      $q = $con->query($refundSql);
      $get = $q->fetchAll(PDO::FETCH_ASSOC);
      foreach ($get as $value) {
        $refundQty = $value['rQty'];
      }
    ?>
      <tr>
        <td><?php echo $row['product']; ?></td>
        <td><?php echo $row['price']; ?>₱</td>
        <td><?php echo $row['qty'] ?></td>
        <td><?php echo $row['category']; ?></td>
        <td><?php echo $row['brand']; ?></td>
        <?php if ($row['loan_status'] == 'Refunded'): ?>
          <?php if ($ordersQty != $refundQty): ?>
              <td>
                <!-- <button id="changeUpdate" type="button" name="button"
                 class="btn btn-sm btn-outline-info" value="
                 <?php
                 // echo $row['oID']
                 ?>" >Change</button> -->
                 <!--  -->
                <button id="refundsModal" type="button" name="button"
                 class="btn btn-sm btn-outline-danger d-print-none" value="<?php echo $row['oID'] ?>" >Refund</button>
              </td>
            <?php endif; ?>
      <?php endif; ?>
      </tr>
    <?php
  }else {
    ?>
    <tr>
      <td colspan="4"> No Data </td>
    </tr>
    <?php
  }
}
?>
