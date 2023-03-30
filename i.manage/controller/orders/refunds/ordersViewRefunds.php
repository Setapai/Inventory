<?php
session_start();
include_once('../../../services/db.php');
database();
global $con;

$id = $_SESSION['orderRecID'];

$sql = "SELECT
products.product,
products.category,
products.price,
products.brand,
refund.id,
refund.note,
refund.addedBy,
refund.status,
DATE(refund.dateTime) AS date,
refund.qty
FROM refund
INNER JOIN order_records ON refund.order_recID = order_records.id
INNER JOIN products ON products.id = refund.prodID WHERE order_records.id = '$id'  ";

if(empty($_POST['query']))
{
  $text = $_POST['query'] ?? '';
  $sql .= "
  AND product LIKE '%$text%'
  ";
}

$q = $con->query($sql);
$res = $q->fetchAll(PDO::FETCH_ASSOC);
$rowCount = $q->rowCount();

if ($rowCount > 0) {
  ?>
  <div class="col">
    <div class="row">
      <div class="col">
      </label>
      <p>Refunds</p>
    </div>
  </div>
  <table class="table-sm table table-bordered table-hover text-center" id="myTable">
    <thead>
      <th>Products</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Model</th>
      <th>Brand</th>
      <th>RefundedBy</th>
      <th>Refunded Date</th>
    </thead>
    <tbody class="text-secondary">
      <?php foreach ($res as $value): ?>
        <tr>
          <td><?php echo $value['product'] ?></td>
          <td><?php echo $value['price'] ?></td>
          <td><?php echo $value['qty'] ?></td>
          <td><?php echo $value['category'] ?></td>
          <td><?php echo $value['brand'] ?></td>
          <td><?php echo $value['addedBy'] ?></td>
          <td><?php echo $value['date'] ?></td>
        </tr>
        <tr>
          <tr>
             <td colspan="6">
              <textarea id="removeRefundDetails" class="form-control" name="name" rows="2" cols="30" placeholder="Note" disabled><?php echo $value['note'] ?></textarea>
            </td>
            <?php if ($value['status'] != "Defective"): ?>
              <td class="align-middle">
                <button id="defectiveRefund" type="button" class="btn btn-sm btn-danger"
                name="button" value="<?php echo $value['id'] ?>">Defective</button>
                <button id="deleteRefund" type="button" class="btn btn-sm btn-danger" 
                name="button" value="<?php echo $value['id'] ?>">Delete</button>
              </td>
            <?php endif; ?>
            <?php if ($value['status'] == "Defective"): ?>
              <td class="align-middle ">
                <p class="text-dark"> Product Defective</p>
              </td>
            <?php endif; ?>
          </tr>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php
}else {
}
?>
