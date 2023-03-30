<?php
include_once('../controller/orders/loans/loansGetDates.php');
$getDate = getDates();
 ?>

<!-- Header -->
<div class="row">
  <div class="col-md-12 text-secondary">
    <h4><span>
      <a href="?orders" class="text-info" >
        <i class="bi bi-arrow-bar-left"></i>
      </a>
    </span>Loans</h4>
    <hr>
  </div>
</div>
<!-- Body -->
<div class="row">
  <div class="col-md-12 card tableView" style="display:none">

  <hr>
<!-- Entrees -->
    <div class="row">
      <div class="col">
        <p>Loans Records</p>
      </div>
      <div class="col">
        <div class="row justify-content-end align-items-end">
          <div class="col-6">
            <select class="form-control" id="CategoryDate">
              <option hidden disabled selected>Date Search</option>
              <option value="">Show All</option>
              <?php foreach ($getDate as  $value): ?>
                <option value="<?php echo $value['cdate'] ?>"><?php echo $value['showdate'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
            <div class="col-6">
                <input type="text" name="search_box" id="search_box" class="form-control " placeholder="Search..." autocomplete="off"/>
            </div>
        </div>
      </div>
    </div>
    <div id="loansTableContents" class="text-secondary">

    </div>
    <hr>
  </div>
</div>

<!-- depositeLoan -->
<div class="modal" id="loanDepositModal" style="
background-color: rgba(33, 37, 41, 0.6);
"></div>
