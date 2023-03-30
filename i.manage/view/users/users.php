<!-- Header -->
<div class="row">
  <div class="col-md-12 text-secondary">
    <h4>Manage Users</h4>
    <hr>
  </div>

</div>
<?php echo $_SESSION['errorHandling'] ?? ''?>
<!-- Body -->
<div class="row">
  <div class="col-md-12 card tableView" style="display:none">
    <div class="row mt-2">
      <div class="col m-2">
        <a href="?addUsers" class=" btn cs_btnAdd"><i class="bi bi-person-plus-fill"></i> Add Users </a>
      </div>
    </div>
    <hr>

<!-- Entrees -->
      <div class="row">
        <div class="col">
          <p>Users</p>
        </div>
        <div class="col">
          <div class="row justify-content-end align-items-end">
              <div class="col-6">
                  <input type="text" name="Search_Box" id="Search_Box" class="form-control " placeholder="Search..." autocomplete="off"/>
              </div>
          </div>
        </div>
      </div>
      <div id="userTableContents" class="text-secondary">

      </div>

    <hr>
  </div>
</div>
