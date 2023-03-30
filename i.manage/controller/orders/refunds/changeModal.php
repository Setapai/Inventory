<?php
include_once('getSelect.php');
$bView = viewBrands();
$cView = viewCategory();
 ?>
<div class="modal-dialog text-secondary modal-lg" style="max-width:90%">
  <div class="modal-content" >
    <div class="modal-header">
        <h5 class="modal-title">Change Refunds</h5>
      </div>
      <div class="modal-body">
            <div class="row m-2">
              <div class="col p-2">
                <div class="row">
                    <div class="col-3">
                    <p>Products</p>
                  </div>
                  <div class="col">
                    <div class="row justify-content-end align-items-center">
                      <div class="col ">
                        <select class="form-control form-control-sm" id="catSearch">
                          <option hidden disabled selected>Category Search</option>
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
                  <div id="changeModalProducts">

                  </div>
              </div>
              <div class="col">
                <div id="showProducts">

                </div>
              </div>
            </div>

          </div>



      <div class="modal-footer">
        <button type="button" id="closeRefundModal" class="btn btn-secondary" >Close</button>
        <button type="button" id="updateOrdersModal" class="btn cs_btnAdd" value="<?php echo $value['id'] ?>">Save changes</button>
      </div>
  </div>
</div>
