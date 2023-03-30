<?php
include_once('../../../services/db.php');
database();
global $con;

    $id = $_POST['id'];

    $sql ="SELECT
    products.product,
    products.category,
    products.brand,
    orders.qty,
    orders.id
    FROM orders INNER JOIN products ON products.id = orders.prodID WHERE orders.id = '$id' ";
    $q = $con->query($sql);
    $res = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach ($res as $value) {
      ?>
        <div class="modal-dialog text-secondary">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Refund Form</h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <div class="m-2">
                      <label>Product</label>
                      <input type="text" class="form-control" value="<?php echo $value['product'] ?>" disabled>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col">
                        <div class="m-2">
                          <label>Model</label>
                          <input type="text"  class="form-control" value="<?php echo $value['category'] ?>" disabled>
                        </div>
                      </div>
                      <div class="col">
                        <div class="m-2">
                          <label>Brand</label>
                          <input type="text" class="form-control" value="<?php echo $value['brand'] ?>" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="m-2">
                      <label>Quantity</label>
                      <!-- qtyMax -->
                      <!-- <input id="orderProdQty" type="text" name="" value="<?php
                      // echo $value['qty']
                      ?>" hidden> -->
                      <!-- qtyShowGetVal -->
                      <!-- <input id="orderItemQty"
                      onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'') || 1 "
                      name="number" class="form-control" type="text" value="<?php
                       // echo $value['qty']
                       ?>" placeholder="Quantity"> -->
                       <input id="orderItemQty" type="text" name="" value="1" disabled class="form-control">
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="m-2">
                      <textarea id="note" class="form-control" name="name" rows="3" cols="30" placeholder="Note"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="closeRefundModal" class="btn btn-secondary" >Close</button>
                <button type="button" id="update-btn" class="btn cs_btnAdd" value="<?php echo $value['id'] ?>">Save changes</button>
              </div>
          </div>
        </div>
      <?php
    }
?>
