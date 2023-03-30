<?php
include_once('../controller/products/brands/brandsView.php');
include_once('../controller/products/category/categoryView.php');
$bView = viewBrands();
$cView = viewCategory();
?>

<!-- Header -->
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-5 text-secondary">
        <h4>Manage Products</h4>
      </div>
      <div class="col-md">
        <div class="row justify-content-center ">
          <div class="col-9">
            <form method="post" enctype="multipart/form-data">
              <div class="row justify-content-end align-items-center">
                <div class="col-4">
                  <input  id="browseExcel" type="file" name="excelData" value="" accept=".csv"  hidden>
                  <button id="BrowseBtn" type="button" class="btn cs_btnExcel">Import Csv</button>
                </div>
                <div class="col d-none" id="browseDetails">
                  <div class="row justify-content-center align-items-center">
                    <div class="col text-center">
                      <p id="excelPathName"></p>
                    </div>
                    <div class="col">
                      <button id="importBtn" type="submit" name="importExcel" class="btn btn-success">Import</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col">
            <form enctype="multipart/form-data" method="post">
              <button  name="exportExcel" class="btn btn-success float-right">Export Csv</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <hr>
  </div>

</div>
<?php echo $_SESSION['errorHandlingProd'] ?? '' ?>
<!-- Body -->
<div class="row">
  <div class="col-md-12 card tableView" style="display:none">
    <div class="row mt-3">
      <div class="col-md-8">
        <div class="row justify-content-start align-items-center">
          <div class="col-3">
            <a href="?addProducts" class="btn cs_btnAdd"><i class="bi bi-box"></i>  Add Product</a>
          </div>
          <div class="col-3 p-0">
            <a href="?category" class="btn cs_btnAdd"><i class="bi bi-menu-app"></i> Add Models</a>
          </div>
          <div class="col-3 p-0">
            <a href="?brands" class="btn cs_btnAdd"><i class="bi bi-tag"></i>  Add Brands</a>
          </div>
        </div>
      </div>
      <div class="col-md">
        <button id="resetProductSearch" type="button" class="float-right btn btn-info" data-toggle="tooltip" data-placement="right" title="Reset Search" >
          <i class="bi bi-arrow-counterclockwise"></i>
        </button>
      </div>
    </div>

    <hr>
    <!-- Entrees -->
    <div class="row">
      <div class="col">
        <div class="row ">
          <div class="col-3 ">
            <p  class="align-middle p-0 mt-1">Products</p>
          </div>
          <div class="col-6">
            <div class="row justify-content-end align-items-center">
              <div class="col ">
                <select class="form-control" id="catSearch">
                  <option hidden  selected value="">Models Search</option>
                  <option value="">Show All</option>
                  <?php foreach ($cView as  $value): ?>
                    <option value="<?php echo $value['category'] ?>"><?php echo $value['category'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col">
                <select class="form-control" id="brandSearch">
                  <option hidden  selected value="">Brands Search</option>
                  <option value="">Show All</option>
                  <?php foreach ($bView as  $value): ?>
                    <option value="<?php echo $value['brands'] ?>"><?php echo $value['brands'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-3">
            <input type="text" name="Search_Box" id="Search_Box" class="form-control" placeholder="Search Products..." autocomplete="off"/>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-12">
            <div class="row justify-content-end align-items-center">

            </div>
          </div>
        </div>
      </div>
    </div>


    <div id="productsTableContents" class="text-secondary">

    </div>
    <hr>
  </div>
</div>
<!--  -->
<div class="row mt-5 tableView text-secondary" style="display:none">
  <div class="col-md-12">
    <h4>Low on Supply</h4>

    <hr>
  </div>
</div>


<!--  -->
<div class="row">
  <div class="col-md-12 card tableView" style="display:none">
    <hr>
    <!-- Entrees -->
    <div class="row">
      <div class="col">
        <p>Products</p>
      </div>

    </div>


    <div id="lowSupProductsTableContents" class="text-secondary">

    </div>
    <hr>
  </div>
</div>


<!-- Modal -->
<div class="modal fade text-secondary" id="lsUpdateModal" tabindex="-1" role="dialog" aria-labelledby="productsLSModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productsLSModalLabel">Update Supply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="productsLSInputsTableContents">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="lsUpdateBtn" type="button" class="btn cs_btnAdd">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="prodViewImageModal" tabindex="-1" role="dialog" aria-labelledby="productsLSModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productsLSModalLabel">Preview Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id=prodViewImageTableContents>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
