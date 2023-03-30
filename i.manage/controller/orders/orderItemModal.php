<?php
include_once('../../services/db.php');
database();
global $con;

    $id = $_POST['id'];


    $sql ="SELECT orders_dummy.id AS orderID, orders_dummy.prodID, products.qty AS productQty,  orders_dummy.qty AS orderQty
      FROM orders_dummy INNER JOIN products ON orders_dummy.prodID = products.id WHERE orders_dummy.id = '$id'  ";
    $q = $con->query($sql);
    $res = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach ($res as $value) {
      ?>
        <div class="modal-dialog text-secondary">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Quantity</h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col">
                    <div class="m-2">
                      <label>Qty</label>
                      <input id="orderProdQty" type="text" name="" value="<?php echo $value['productQty'] ?>" hidden>
                      <input id="orderItemQty"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'') || 1 " name="number" class="form-control" type="text" value="<?php echo $value['orderQty'] ?>" placeholder="Quantity">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="closeOrderItemModal" class="btn btn-secondary" >Close</button>
                <button type="button" id="update-btn" class="btn cs_btnAdd" value="<?php echo $value['orderID'] ?>">Save changes</button>
              </div>
          </div>
        </div>
      <?php
    }
?>
