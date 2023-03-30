<?php
include_once('../model/defectiveProducts/defectiveProd.php');
$fetch = viewDefects();
 ?>
 <?php foreach ($fetch as $value): ?>

<div class="row">
  <div class="col-md text-secondary">
    <div class="row">
      <div class="col">
        <h4><span>
          <a href="?defectiveProducts" class="text-info" >
            <i class="bi bi-arrow-bar-left"></i>
          </a>
        </span>Add Defective Products</h4>
      </div>
      <div class="col">
        <p class="float-right">
          AddedBy :
          <span>
            <?php echo $value['acc'] ?>
          </span>
        </p>
      </div>
    </div>

  </div>
</div>
<!-- BOdy -->
<hr>

<div class="row">
  <div class="col-12 card tableView" style="display:none">
    <div class="row">
      <div class="col card m-2">
        <form action="?defectiveProducts" method="post">
          <div class="row">
            <div class="col-12 mt-2">
              <hr>
              <p>Products : <?php echo $value['product'] ?></p>
              <hr>
            </div>
            <hr>
            <div class="col-12">
              <p>Model : <?php echo $value['category'] ?></p>
              <hr>
            </div>
            <div class="col-12">
              <div class="row justify-content-center align-items-center">
                <div class="col-10">
                  <p>brand : <?php echo $value['brand'] ?></p>
                  <hr>
                </div>
                <div class="col">
                  <div class="row justify-content-start align-items-center">
                    <div class="col">
                      <label>Quantitiy:</label>
                    </div>
                    <div class="col">
                          <input class="form-control" onkeyup="if (/\D/g.test(this.value))
                           this.value = this.value.replace(/\D/g,'') || 1 " type="text" name="qty" value="<?php echo $value['qty'] ?>"
                            placeholder="Qty" required>
                    </div>
                  </div>
              </div>

              </div>
            </div>
            <div class="col-12">
            <textarea class="form-control"  name="defDesc" rows="8" cols="80" placeholder="Products Defects" required><?php echo $value['description'] ?></textarea>
            </div>
          </div>
          <hr>
          <div class="row m-3">
            <div class="col-6">
              <?php if (!empty($value['updateAcc']) AND !empty($value['lastUpdate'])): ?>

              <div class="row">
                <div class="col">
                  <p>
                    updatedBy :
                    <span>
                      <?php echo $value['updateAcc'] ?>
                    </span>
                  </p>
                </div>
                <div class="col">
                  <p class="float-right">
                    lastUpdate :
                    <span>
                      <?php echo $value['lastUpdate'] ?>
                    </span>
                  </p>
                </div>
              </div>
            <?php endif; ?>


            </div>
            <div class="col-6">
              <button type="submit" class="float-right btn btn-info" name="updateDefects" value="<?php echo $value['id'] ?>"><i class="bi bi-exclamation-square-fill"></i> Defective</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
