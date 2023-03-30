<?php
include_once('../../services/db.php');
database();
global $con;

  $id = $_POST['id'] ?? '';
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
      <div class="row ">
        <div class="col-12 mt-2">
          <hr>
          <p>Products : <?php echo $value['product'] ?></p>
          <hr>
        </div>
        <hr>
        <div class="col-12">
          <p>Model : <?php echo $value['category'] ?></p>
          <hr>
        </div>
        <div class="col-12">
          <div class="row justify-content-center align-items-center">
            <div class="col">
              <p>brand : <?php echo $value['brand'] ?></p>
              <hr>
            </div>
            <div class="col">
              <p>Quantitiy:
                <span id="defProdQtyUpdate" class="btn btn-outline-info btn-sm">1</span>
              </p>
          </div>

          </div>
        </div>
        <div class="col-12">
        <textarea class="form-control"  name="defDesc" rows="8" cols="80" placeholder="Products Defects" required></textarea>
        </div>
      </div>
      <hr>
      <div class="row m-2">
        <div class="col-12">
          <button type="submit" class="float-right btn btn-info" name="defectiveBtn"><i class="bi bi-exclamation-square-fill"></i> Defective</button>
        </div>
      </div>
    </form>
    <?php
  }

 ?>
