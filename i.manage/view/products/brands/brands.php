<!-- Header -->
<div class="row">
  <div class="col-md-12 text-secondary">
    <h4><span>
      <a href="?products" class="text-info" >
        <i class="bi bi-arrow-bar-left"></i>
      </a>
    </span>Manage Brands</h4>
    <hr>
  </div>

</div>
<div id="errorHandlingBrand">
</div>
<!-- Body -->
<div class="row text-secondary">
  <div class="col-md-12 card tableView" style="display:none">
    <div class="row">
      <div class="mt-3 ml-3">
        <button class="btn cs_btnAdd" type="button" data-toggle="modal" data-target="#addBrandsModal"><i class="bi bi-tag"></i> Add Brands</button>
      </div>
    </div>
    <hr>
    <!-- Entrees -->
    <div class="row">
      <div class="col">
        <p>Brands</p>
      </div>
      <div class="col">
        <div class="row justify-content-end align-items-end">
            <div class="col-6">
                <input type="text" name="Search_Box" id="Search_Box" class="form-control " placeholder="Search..." autocomplete="off"/>
            </div>
        </div>
      </div>
    </div>
    <div id="brandsTableContents">

    </div>
    <hr>
  </div>
</div>

<!-- Modal -->
<div class="modal text-secondary fade" id="addBrandsModal" tabindex="-1" role="dialog" aria-labelledby="addBrandModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Brands</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Brand Name</label>
        <input id="brandsName"class="form-control"type="text" name="" value="" placeholder="Brand">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="addBrandBtn" type="button" class="btn cs_btnAdd">Add Brand <i class="bi bi-tag"></i></button>
      </div>
    </div>
  </div>
</div>
