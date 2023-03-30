<?php
include_once('../../../services/db.php');
database();
global $con;

  $id = $_POST['id'];
  $sql = "SELECT * FROM products WHERE id = '$id' ";
  $q = $con->query($sql);
  $fetch = $q->fetchAll(PDO::FETCH_ASSOC);
    // code...
  foreach ($fetch as  $value) {
    ?>
    <form action="?defectiveProducts" method="post">
    <input id="getProdID"  hidden type="text" name="prodID" value="<?php echo $value['id'] ?>">
    <input id="defProdGetQty"  hidden type="text" name="newQty" value="">
    <input id="defProdQty"  hidden type="text" name="curQty" value="<?php echo $value['qty'] ?>">
      <div class="row card">
        <div class="col-12 mt-2">
          <label>Products:</label>
          <input type="text" name="" value="<?php echo $value['product'] ?>" class="form-control" disabled>
          <hr>
        </div>
        <div class="col-12">
          <label>Category:</label>
          <input type="text" name="" value="<?php echo $value['category'] ?>" class="form-control" disabled>
          <hr>
        </div>
        <div class="col-12">
          <div class="row justify-content-center align-items-center">
            <div class="col">
              <label>Brand:</label>
              <input type="text" name="" value="<?php echo $value['brand'] ?>" class="form-control" disabled>
              <hr>
            </div>
            <div class="col">
              <label>Quantity:</label>
              <input type="text" name="" value="1" class="form-control">
              <hr>
          </div>
          </div>
        </div>
        <div class="col-12">

        </div>
        <hr>
      </div>
    </form>
    <?php
  }

 ?>
