<?php
include_once('../controller/products/brands/brandsView.php');
include_once('../controller/products/category/categoryView.php');
$bView = viewBrands();
$cView = viewCategory();
 ?>
<!-- Header -->
<div class="row">
  <div class="col-md-12 text-secondary">
    <h4><span>
      <a href="?products" class="text-info" >
        <i class="bi bi-arrow-bar-left"></i>
      </a>
    </span>Add Products</h4>
    <hr>
  </div>
</div>
<!-- Body -->
<div class="row">
  <div class="col-12 card">
    <form  action="?products" method="post" enctype="multipart/form-data">
      <!-- Hidden Form -->
      <input id="uploadFile"  type="file" class="hidden_img" name="image" accept="image/*" onchange="readURL(this);" style="display:none;" >
      <hr>
      <!-- Images -->
        <div class="row m-2 d-none">
          <h6>Image</h6>
        </div>
        <div class="row m-2 d-none">
          <div class="col-md-2">
            <!-- Upload Btns -->
              <button type="button" class="btn btn-primary" id="uploadTrigger"  onchange="readURL(this);" data-toggle="tooltip" data-placement="right" title="Upload Image"  ><i class="bi bi-file-image"></i></button>
              <!-- Image Prev -->
          </div>
        </div>
          <!-- Forms -->
          <div class="row">
            <div class="col-6">
              <div class="row p-2 text-secondary">
                <!-- Product Name -->
                <div class=" col-12 m-2">
                  <label>Product Name</label>
                  <input  class="form-control" type="text" name="pname" value="" placeholder="Product Name" required >
                </div>
                <!-- Price -->
                <div class=" col-12 m-2">
                  <label>Retail Price</label>
                  <input  class="form-control" type="number" name="price" value="" placeholder="Price"  required style="
                  -moz-appearance: textfield;
                  ">
                </div>
                <!-- Wholesale Price -->
                  <div class=" col-12 m-2">
                    <label>WholeSale Price</label>
                    <input  class="form-control" type="number" name="wprice" value="" placeholder="Price"  required style="
                    -moz-appearance: textfield;
                    ">
                  </div>
                <!-- Quantity -->
                <div class="col-12  m-2">
                  <label>Quantity</label>
                  <input  class="form-control" type="number" name="qty" value="" placeholder="Quantity" style="
                  -moz-appearance: textfield;
                  " required>
                </div>
                <div class="col-12  m-2">
                  <label>Description</label>
                  <textarea class="form-control" name="desc" rows="2" cols="80" placeholder="Product Description"></textarea>
                </div>
                <hr>
                <!-- End -->
                <div class="col-12 mt-2 mb-2">
                    <div class="float-right">
                      <button type="submit" name="addProducts" class="btn cs_btnAdd">Save Product  <i class="bi bi-box-arrow-up"></i></button>
                  </div>
                </div>
                <!--  -->
              </div>
            </div>
            <div class="col-6">
              <div class="row mt-3 mb-5 text-secondary">
                <div class=" col">
                  <label>Type Of Model</label>
                  <select class="form-control" name="cat" required>
                      <option selected disabled hidden>Model</option>
                      <?php foreach ($cView as $value): ?>
                        <option value="<?php echo $value['category'] ?>"><?php echo $value['category'] ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>
                <div class=" col">
                  <label>Type Of Brand</label>
                  <select class="form-control" name="brand" required>
                      <option selected disabled hidden>Brand</option>
                      <?php foreach ($bView as $value): ?>
                        <option value="<?php echo $value['brands'] ?>"><?php echo $value['brands'] ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="row justify-content-center align-items-center p-2">
                <div class="img_preview w-50" id="img_preview_container" data-toggle="tooltip" data-placement="right" title="View Image">
                  <center>
                  <img id="upload_previmage" class="img-thumbnail rounded img-responsive" data-toggle="modal" data-target="#viewImagePicture" src="" alt="Image Preview" style="cursor: pointer; display:none; ">
                </center>
                </div>
              </div>

            </div>
          </div>
    </form>
  </div>
</div>

<!-- Modal View -->
<!-- Modal -->

<div class="modal fade bd-example-modal-lg" id="viewImagePicture" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-secondary" id="imageModalLabel">Image Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center align-items-center">
          <div class=" w-50">
            <center>
            <img  id="modalViewImage"  class="img-fluid img-responsive rounded" src="" alt="">
          </center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
// Preview Image
    function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                // Show Thumbnail
                $('#upload_previmage').fadeIn();
                  // Upload Preview Thumbnail
                  $('#upload_previmage')
                    .attr('src', e.target.result)
                    .css("width","100%")
                    .css("height","100%");
                    // ModalView
                  $('#modalViewImage')
                    .attr('src', e.target.result)
                    .css("width","100%")
                    .css("height","100%");
              };
              reader.readAsDataURL(input.files[0]);
          }
      }
</script>
