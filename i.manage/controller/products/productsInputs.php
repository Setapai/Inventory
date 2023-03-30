<?php
include_once('../../services/db.php');
database();
  global $con;
  $id = $_POST['id'];
  $call ="SELECT * FROM products WHERE id = '$id' ";
  $q = $con->query($call);
  $fetchUsers = $q->fetchAll(PDO::FETCH_ASSOC);
  foreach ($fetchUsers as $value) {
    ?>
    <input id="getInputID" class="form-control" type="text" value="<?php echo $id ?>" disabled hidden>
    <div class="m-2">
      <label>Product</label>
      <input class="form-control" type="text" value="<?php echo $value['product'] ?>" disabled>
    </div>
    <div class="m-2">
      <label>Category</label>
      <input class="form-control" type="text" value="<?php echo $value['category'] ?>" disabled>
    </div>
    <div class="m-2">
      <label>Brand</label>
      <input class="form-control" type="text" value="<?php echo $value['brand'] ?>" disabled>
    </div>
    <div class="m-2">
          <label>Quantitiy</label>
          <input class="form-control" type="text" id="lsGetQty" value="<?php echo $value['qty'] ?>" placeholder="Quantity">
    </div>


    <?php
  }
?>
