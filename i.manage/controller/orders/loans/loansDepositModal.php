<?php
include_once('../../../services/db.php');
database();
global $con;

    $id = $_POST['id'];

    $sql ="SELECT
            order_records.id AS orderID,
            SUM(loans.payments) AS balance,
            (loans.discountedTotal - SUM(loans.payments)) AS remBalanace,
            loans.discountedTotal,
            loans.total
            FROM loans INNER JOIN order_records ON order_records.id = loans.order_recID
            WHERE order_records.id = '$id' GROUP BY order_records.id,loans.discountedTotal,loans.total ";
    $q = $con->query($sql);
    $res = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach ($res as $value) {
      ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deposit Payment</h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-12 mt-2">
                      <label>RemainingBalance</label>
                      <input id="total" class="form-control" disabled type="text" name="" value="<?php echo $value['total'] ?>" hidden>
                      <input id="disTotal" class="form-control" disabled type="text" name="" value="<?php echo $value['discountedTotal'] ?>" hidden>
                      <input id="remBal" class="form-control" disabled type="text" name="" value="<?php echo $value['remBalanace'] ?>" >
                      <input id="curbal" class="form-control" disabled type="text" name="" value="<?php echo $value['balance'] ?>" hidden>
                  </div>
                  <div class="col-12 mt-2">
                      <label>How much is the Deposit</label>
                      <input id="newBal"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'') || 1 "
                      name="number" class="form-control" type="text" value="1" placeholder="Quantity">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="closeOrderItemModal" class="btn btn-danger" >Close</button>
                <button type="button" id="loanUpdate" class="btn btn-primary" value="<?php echo $value['orderID'] ?>">Save changes</button>
              </div>
          </div>
        </div>
      <?php
    }
?>
