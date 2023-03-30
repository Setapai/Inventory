<?php
include_once('../controller/defectiveProducts/defDates.php');
$getDate = getDates();
 ?>
<!-- Header -->
<div class="row">
  <div class="col-md-12 text-secondary">
    <h4><span>
    </span>Defective Products</h4>
    <hr>
  </div>
</div>
<?php echo $_SESSION['errorHandlingDefProd'] ?? null ?>
<!-- Body -->
<div class="row">
  <div class="col-md-12 card tableView" style="display:none">
    <div class="row mt-3 justify-content-start align-items-center">
    <div class="col-2 ">
      <a href="?addDefectiveProduct" class="btn cs_btnAdd"><i class="bi bi-box"></i>  Add Product</a>
    </div>
  </div>
  <hr>
<!-- Entrees -->
    <div class="row">
      <div class="col">
        <p>Products</p>
      </div>
      <div class="col">
        <div class="row justify-content-end align-items-end">
          <div class="col-6">
            <select class="form-control" id="CategoryDate">
              <option hidden disabled selected>Date Search</option>
              <option value="">Show All</option>
              <?php foreach ($getDate as  $value): ?>
                <option value="<?php echo $value['showdate'] ?>"><?php echo $value['showdate'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
            <div class="col-6">
                <input type="text" name="search_box" id="search_box" class="form-control " placeholder="Search..." autocomplete="off"/>
            </div>
        </div>
      </div>
    </div>
    <div id="defTableContents" class="text-secondary">

    </div>
    <hr>
  </div>
</div>
