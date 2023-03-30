<?php
include_once('../controller/reports/getYear.php');
$getYear = getYear();
 ?>
<!-- Header -->
<div class="row text-secondary">
  <div class="col-md-12">
    <h4><span>
    </span>Sales Reports</h4>
    <hr>
  </div>
</div>
<!-- Body -->
<div class="row text-secondary">
  <div class="col-12 card m-2">
    <!--  -->
    <div class="row mt-4 m-3">
      <div class="col-3">
        <h4>This Week's Reports</h4>
      </div>
      <div class="col" id="SRweekTotal">

      </div>
    </div>

    <div class="row m-3">
        <div class="col-12">
          <div class="row justify-content-end align-items-end">
            <div class="col-4 m-2">
                <input type="text" name="search_box_w" id="search_box_w" class="form-control " placeholder="Search..." autocomplete="off"/>
            </div>
          </div>
        </div>
      <div id="weeklySalesReport" class="text-secondary col-12">

      </div>
    </div>

  </div>

  <div class="col-12 card m-2">
    <!-- Monthly -->
    <div class="row mt-4 m-3">
      <div class="col-3">
        <h4>This Month's Reports</h4>
      </div>
      <div class="col" id="SRmonthlyTotal">
      </div>
    </div>

    <div class="row m-3">
        <div class="col-12">
          <div class="row justify-content-end align-items-end">
            <div class="col-4 m-2">
                <input type="text" name="search_box_m" id="search_box_m" class="form-control " placeholder="Search..." autocomplete="off"/>
            </div>
          </div>
        </div>
      <div id="monthlySalesReport" class="text-secondary col-12">

      </div>
    </div>
  </div>

  <div class="col-12 card m-2">
    <!-- Monthly -->
    <div class="row mt-4 m-3">
      <div class="col-3">
        <h4>This Years's Reports</h4>
      </div>
      <div class="col" id="SRyearlyTotal">
      </div>
    </div>

    <div class="row m-3">
        <div class="col-12">
          <div class="row justify-content-end align-items-end">
            <div class="col-3 m-2">
              <select class="form-control" id="SelectYear">
                <option selected disabled hidden>Select A Year</option>
                <?php foreach ($getYear as $year): ?>
                  <option value="<?php echo $year['year'] ?>"><?php echo $year['year'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-4 m-2">
                <input type="text" name="search_box_y" id="search_box_y" class="form-control " placeholder="Search..." autocomplete="off"/>
            </div>
          </div>
        </div>
      <div id="yearsSalesReport" class="text-secondary col-12">

      </div>
    </div>
  </div>

</div>
