<?php
include_once('../controller/reports/getYear.php');
$getYear = getYear();
?>

<!-- Header -->
<div class="row text-secondary">
  <div class="col-md-12">
    <h4><span>
    </span>Reports</h4>
    <hr>
  </div>
</div>
<!-- Body -->
<!-- Weekly -->
<div class="row text-secondary">
  <div class="col card m-2">
    <div class="row mt-3">
      <div class="col">
        <h4>This Week's Income</h4>
      </div>
    </div>
    <!--  -->
    <div class="row ">
      <div class="col-8 m-3 mt-0 ">
        <div class="row justify-content-center align-items-center">
          <canvas id="weeklyChart" height="100"></canvas>
        </div>
      </div>
      <div id="WeeklyReports" class="col">
      </div>

    </div>
    <div class="row m-3">
      <div class="col-12">
        <div class="row justify-content-end align-items-end">
          <div class="col-4 m-2">
            <input type="text" name="search_box_w" id="search_box_w" class="form-control " placeholder="Search..." autocomplete="off"/>
          </div>
          <div class="col m-2">
            <a href="?loans" class="btn btn-outline-info btn-sm float-right"><i class="bi bi-border-style"></i> Go to Loans</a>
          </div>
        </div>
      </div>
      <div id="weeklyLoansTableContents" class="text-secondary col-12">

      </div>
    </div>
    <!--  -->
  </div>
</div>
<hr>
<!-- Monthly -->
<div class="row text-secondary">
  <div class="col card m-2">
    <div class="row mt-3">
      <div class="col">
        <h4>This Month's Income</h4>
      </div>
    </div>
    <!--  -->
    <div class="row">
      <div class="col-8 m-3 mt-0 ">
        <canvas id="monthlyChart" height="100"></canvas>
      </div>
      <div id="monthlyReports" class="col">
      </div>
    </div>
    <div class="row m-3">
      <div class="col-12">
        <div class="row justify-content-end align-items-end">
          <div class="col-4 m-2">
            <input type="text" name="search_box_m" id="search_box_m" class="form-control " placeholder="Search..." autocomplete="off"/>
          </div>
          <div class="col m-2">
            <a href="?loans" class="btn btn-outline-info btn-sm float-right"><i class="bi bi-border-style"></i> Go to Loans</a>
          </div>
        </div>
      </div>
      <div id="monthlyLoansTableContents" class="text-secondary col-12">

      </div>
    </div>
    <!--  -->
  </div>
</div>
<hr>
<!-- Yearly -->
<div class="row text-secondary">
  <div class="col card m-2">
    <div class="row mt-3">
      <div class="col">
        <h4>This Year's Income</h4>
      </div>
    </div>
    <!--  -->
    <div class="row">
      <div class="col-8 m-3 mt-0 ">
        <canvas id="yearlyChart" height="100"></canvas>
      </div>
      <div class="col">
        <div class="row justify-content-center align-items-center">
          <div class="col-8">
            <select class="form-control" id="SelectYear">
              <option selected disabled hidden>Select A Year</option>
              <?php foreach ($getYear as $year): ?>
                <option value="<?php echo $year['year'] ?>"><?php echo $year['year'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div id="yearlyReports">
        </div>
      </div>
    </div>
    <div class="row m-3">
      <div class="col-12">
        <div class="row justify-content-end align-items-end">
          <div class="col-4 m-2">
            <input type="text" name="search_box_y" id="search_box_y" class="form-control " placeholder="Search..." autocomplete="off"/>
          </div>
          <div class="col m-2">
            <a href="?loans" class="btn btn-outline-info btn-sm float-right"><i class="bi bi-border-style"></i> Go to Loans</a>
          </div>
        </div>
      </div>
      <div id="yearlyLoansTableContents" class="text-secondary col-12">

      </div>
    </div>
    <!--  -->
  </div>
</div>
<hr>
