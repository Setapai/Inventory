<?php
include_once('../model/orders/ordersAdd.php');
include_once('../model/orders/loans/viewLoans.php');
  if (!empty($_POST['viewLoans'])) {
    $res = viewLoans();
  }else {
    $res = viewOrders();
  }
 ?>

<!-- Header -->
<div class="row d-print-none text-secondary">
  <div class="col-md-12">
    <div class="row">
      <div class="col">
        <h4>View Order </h4>
      </div>
      <?php if (empty($_POST['saveOrder'])): ?>
          <div class="col" id="getRefundsBtn">
          </div>
      <?php endif; ?>
    </div>
    <hr>
  </div>

</div>
<!-- Body -->

<?php foreach ($res as $value):
    $formattedDate = date("m-d-Y", strtotime($value['date']));
    $time = date("g:i:s A", strtotime($value['date']));
  ?>
  <input id="getViewID"type="text" name="" value="<?php echo $value['id'] ?>" hidden>
  <div class="row">
  <div class="col-12  tableView " style="display:none">
      <!-- Header Form -->
    <div class="row p-3">
        <div class="col-6 ">
          <div class="m-2 ">
            <label>Cashier:</label>
            <p><?php echo $value['sold_by'] ?></p>
          </div>
          <div class="m-2 ">
            <label>Reciept NO:</label>
            <p><?php echo $value['receipt']; ?></p>
          </div>
          <div class="m-2 ">
            <label>Customer Name :  </label>
            <p><?php echo $value['name']; ?></p>
          </div>
          <div class="m-2">
            <label>Phone Number : </label>
            <p><?php echo $value['pnum'] ?></p>
          </div>
        </div>
        <div class="col-6">
          <div class="text-right">
            <p  class=" text-dark" >Date : <?php echo $formattedDate; ?></span></p>
            <p  class=" text-dark" >TimeStamp : <?php echo $time ?></span></p>
          </div>
          <hr>
          <div class="row mt-5 justify-content-end align-items-start">
            <div class="col">
              <?php if ($value['loan_status'] == 'Inpass' OR $value['loan_status'] == 'Loan'): ?>
                <label>Loan Status :
                  <span>
                    <?php echo $value['loan_status'];?>
                  </span>
                </label>
              <?php endif; ?>
              <?php if ($value['loan_status'] == 'Inpass'): ?>
                <label>InpassDate :
                  <span>
                    <?php echo $value['inDate'];?>
                  </span>
                </label>
              <?php endif; ?>


              <?php if ($value['loan_status'] == 'Loan'): ?>

                <hr>
                <label>Balance :
                  <span>
                  <?php echo $value['balance'];?> ₱
                </span>
                </label>
                <hr>
                <label>Remaining Balance :
                  <span>
                  <?php echo $value['remBalanace'];?> ₱
                </span>
                </label>
              <?php endif; ?>
            </div>
            <div class="col ">

              <label>Discount :
                <span>
                <?php echo $value['discount'] ?>
              </span>
              <!--  -->
              <hr>
              <!-- Loans -->

            <!--  -->
            <div id="vOrdersTotalAmount">

            </div>
            <!--  -->
            </div>

          </div>

        </div>
        <!-- Body Form -->
    </div>
    <hr>
    <!-- Body -->
    <div class="row">
      <!-- Orders -->
      <div class="col">
        <div class="row">
            <div class="col">
            </label>
            <p>Orders</p>
          </div>
          <div class="col-3">
            <input  class="form-control form-control-sm d-print-none" type="text" name="search" id="search" value=""
            placeholder="Search Orders">
          </div>
        </div>
        <table class="table-sm table table-bordered table-hover text-center" id="myTable">
          <thead>
              <th>Products</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Model</th>
              <th>Brand</th>
          </thead>
          <tbody  id="viewOrderItemsTableContents" class="text-secondary">
          </tbody>
      </table>
      </div>

    </div>
    <hr>
    <div class="row" id="viewRefundsItemsTableContents">
      <!-- Refunds -->
      <hr>
    </div>
    <!-- Loans -->
    <?php if ($value['loan_status'] == 'Loan' || $value['loan_status'] == 'Inpass'): ?>
      <div class="col">
        <div class="row justify-content-center align-items-center">
            <div class="col">
            <p>Loans Records</p>
          </div>

        </div>
        <table class="table-sm table table-bordered table-hover text-center" id="myTable">
          <thead>
              <th>Cashier</th>
              <th>Balance</th>
              <th>Date</th>
          </thead>
          <tbody  id="viewLoansDataContents" class="text-secondary">
          </tbody>
      </table>
      </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-12  d-print-none">

        <div class="row justify-content-end align-item-end pb-3 mr-3">
          <div class="m-2">
            <button  id="printBtn" type="submit" name="saveOrder" class="btn cs_btnAdd"><i class="bi bi-printer"></i> Print</button>
          </div>
          <div class="m-2">
            <?php if (!empty($_SESSION['viewOrderCondition'])): ?>
              <a href="?dashboard" class="btn btn-info"><i class="bi bi-arrow-return-right"></i> Return</a>
            <?php endif; ?>
            <?php if (!empty($_SESSION['salesReportReturn'])): ?>
              <a href="?salesReports" class="btn btn-info"><i class="bi bi-arrow-return-right"></i> Return</a>
            <?php endif; ?>

            <?php if (empty($_SESSION['viewOrderCondition']) AND empty($_SESSION['salesReportReturn']) ): ?>
                <?php
                if (!empty($_POST['viewLoans'])) {
                  ?>
                    <a href="?loans" class="btn btn-info"><i class="bi bi-arrow-return-right"></i> Return</a>
                  <?php
                }else {
                  ?>
                    <a href="?orders" class="btn btn-info"><i class="bi bi-arrow-return-right"></i> Return</a>
                  <?php
                }
                 ?>
           <?php endif; ?>
          </div>
      </div>

      </div>
    </div>

  </div>
</div>

<?php endforeach; ?>
<!-- updateQty -->
<div class="modal" id="updateRefundsQty" style="
background-color: rgba(33, 37, 41, 0.6);
"></div>
<!-- ChangeRefunds -->
<div class="modal" id="changeRefunds" style="
background-color: rgba(33, 37, 41, 0.6);
"></div>
