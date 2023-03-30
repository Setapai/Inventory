<?php
include_once('../controller/products/brands/brandsView.php');
include_once('../controller/products/category/categoryView.php');
$bView = viewBrands();
$cView = viewCategory();
?>
<!-- Header -->
<div class="row">
  <div class="col-md text-secondary">
    <h4><span>
      <?php if ($_SESSION['accStatus'] == 'Admin'): ?>
      <a href="?orders" class="text-info" >
        <i class="bi bi-arrow-bar-left"></i>
      </a>
    <?php endif; ?>
    </span>Add Orders</h4>
  </div>
  <div class="col-md">
    <button type="button" id="sidebarCollapse" class=" float-right btn btn-info shadow-none">
      <i class="bi bi-arrows-angle-expand"></i>
    </button>
    <div class="row">
      <div class="col">
        <p  class=" text-dark" >Date : <span id="getDate" ></span></p>
      </div>
      <div class="col">
        <p  class=" text-dark" >TimeStamp : <span id="getTime" ></span></p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <hr class="m-0" style="margin-top:0.4rem !important;  margin-bottom:0.4rem !important;">
  </div>
</div>

<!-- Body -->
<div class="row">
  <div class="col-12 card tableView" style="display:none">
    <!-- NewData -->
    <form action="?viewOrders" method="post">
      <div class="row">


        <div class="col card m-2 ">
          <div class="row">
            <div class="col-12 ">
              <div class="row justify-content-center align-items-center">
                <div class="col m-2">
                  <label>Customer Name</label>
                  <input  class="form-control form-control-sm " type="text" name="custname" value="" required placeholder="Name">
                </div>
                <div class="col m-2">
                  <label> Phone Number</label>
                  <input class="form-control form-control-sm  "  maxlength="11" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" type="text" name="custPnum" value="" style="
                  -moz-appearance: textfield;
                  " placeholder="Phone Number">
                </div>
              </div>

            </div>
          </div>
          <hr class="m-0" style="margin-top:0.2rem !important;  margin-bottom:0.2rem !important;">
          <!--  -->
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
              <div id="orderProductsTableContents">

              </div>
            </div>
          </div>

        </div>

        <div class="col-6 card m-2">
          <!--  -->
          <div class="row">
            <div class="col-12">
              <div class="row justify-content-center align-items-center">
                <div class="col m-2">
                  <label>Discount:</label>
                  <div class="row justify-content-center align-items-center">
                    <div class="col pr-2">
                      <input id="discount"  type="text" name="discount" class="form-control form-control-sm"
                       onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="" placeholder="Discount">
                    </div>
                  </div>
                </div>
                <div class="col text-center">
                  <label class="">Total  :
                    <span id="getTotalContents" >
                    </span>₱
                  </label>
                </div>
                <div class="col">
                  <div id="getBtn">

                  </div>
                </div>
              </div>
              <div class="row justify-content-end align-items-center">
                <div class="col m-2">
                  <input id="downPayment" type="text" name="dPayment"
                  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                  class="form-control form-control-sm " value="" placeholder="Downpayment" style="display:none">
                </div>
                <div class="col">
                  <input id="copyTotal" type="" name="total" value="" hidden>
                  <input id="maxDiscount" type="" name="" value="" hidden>
                  <button  id="loanBtn" class="float-right btn btn-small btn-info"  type="button" name="button">Loan <i class="bi bi-credit-card-2-back-fill"></i></button>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div id="orderItemsTableContents">

          </div>

        </div>

      </div>
    </form>
  </div>
</div>

<!-- updateOrdersQty -->
<div class="modal" id="updateQtyModal" style="
background-color: rgba(33, 37, 41, 0.6);
"></div>
