<?php
include_once('../controller/orders/getYear.php');
$getYear = getYear();
 ?>

<!-- Header -->
<div class="row text-secondary">
  <div class="col-md-12">
    <h4>Manage Orders</h4>
    <hr>
  </div>
</div>
<!-- Body -->
<div class="row">
  <div class="col-md-12 card tableView" style="display:none">
    <div class="row mt-3 justify-content-start align-items-center">
    <div class="col-3">
      <div class="row">
        <div class="col">
          <?php if ($_SESSION['accStatus'] == 'Admin'): ?>
            <a href="?addOrders" class="btn cs_btnAdd"><i class="bi bi-bag-plus"></i> Add Order</a>
        <?php endif; ?>
        </div>
        <!-- <div class="col">
          <a href="?refunds" class="btn cs_btnAdd"><i class="bi bi-bootstrap-reboot"></i> Refunds</a>
        </div> -->
      </div>
    </div>
    <div class="col">
      <a href="?loans" class="btn cs_btnAdd float-right"><i class="bi bi-cash-stack"></i> Loans</a>
    </div>
  </div>
  <hr>
<!-- Entrees -->
<div class="row justify-content-end align-items-center mb-3">
<!-- year -->
  <div class="col-3 ">
    <select class="form-control" id="year" >
      <option hidden disabled selected>Year Search</option>
      <option value="">Show All</option>
      <?php foreach ($getYear as  $value): ?>
        <option value="<?php echo $value['year'] ?>"><?php echo $value['year'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <!-- month -->
  <div class="col-3 " id="getMonth">
  </div>
  <!-- day -->
  <div class="col-3" id="getDay">

  </div>
  <!-- reset -->
  <div class="col-1">
    <button id="resetRecords" type="button" class=" btn btn-info" data-toggle="tooltip" data-placement="right" title="Reset Search" >
      <i class="bi bi-arrow-counterclockwise"></i>
    </button>
  </div>
  <!--  -->
</div>
    <div class="row">
      <div class="col-2">
        <p>Orders</p>
      </div>
      <div class="col">
        <div class="row justify-content-end align-items-end">
            <div class="col-6">
                <input type="text" name="search_box" id="search_box" class="form-control " placeholder="Search..." autocomplete="off"/>
            </div>
        </div>
      </div>
    </div>
    <div id="ordersTableContents" class="text-secondary">

    </div>
    <hr>
  </div>
</div>
