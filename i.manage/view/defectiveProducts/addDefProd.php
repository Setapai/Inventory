<?php
include_once('../controller/products/brands/brandsView.php');
include_once('../controller/products/category/categoryView.php');
$bView = viewBrands();
$cView = viewCategory();
 ?>
<!-- body -->
<div class="row">
  <div class="col-md text-secondary">
    <h4><span>
      <a href="?defectiveProducts" class="text-info" >
        <i class="bi bi-arrow-bar-left"></i>
      </a>
    </span>Add Defective Products</h4>
  </div>
</div>
<!-- BOdy -->
<hr>
<div class="row m-2">
  <div class="col-6">

  <button id="resetProductSearch" type="button" class="float-right btn btn-info" data-toggle="tooltip" data-placement="right" title="Reset Search" >
    <i class="bi bi-arrow-counterclockwise"></i>
  </button>
</div>
</div>
<div class="row">
  <div class="col-12 card tableView" style="display:none">
    <div class="row">
      <div class="col-6 card m-2">
        <div class="row">
          <div class="col-12 p-2">
            <div class="row">
                <div class="col-3">
                <p>Products</p>
              </div>
              <div class="col">
                <div class="row justify-content-end align-items-center">
                  <div class="col ">
                    <select class="form-control form-control-sm" id="catSearch">
                      <option hidden disabled selected>Model Search</option>
                      <option value="">Show All</option>
                      <?php foreach ($cView as  $value): ?>
                        <option value="<?php echo $value['category'] ?>"><?php echo $value['category'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col">
                    <select class="form-control form-control-sm" id="brandSearch">
                      <option hidden disabled selected>Brands Search</option>
                      <option value="">Show All</option>
                      <?php foreach ($bView as  $value): ?>
                        <option value="<?php echo $value['brands'] ?>"><?php echo $value['brands'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

              </div>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-12">
                <div class="row justify-content-end align-items-center">

                <div class="col-5">
                  <input  class="form-control form-control-sm" type="text" name="search_box" id="search_box" value="" placeholder="Search Products">
                </div>
              </div>
              </div>
            </div>
              <div id="defProductsTableContents">

              </div>
          </div>
        </div>
      </div>
      <div class="col card m-2">
        <div id="getProductTableContents">

        </div>
      </div>
    </div>
  </div>
</div>

<div  class="modal" id="defProdmodal" style="
  background-color: rgba(33, 37, 41, 0.6);
">

</div>
