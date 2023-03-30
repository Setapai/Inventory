<!-- login -->
<div class="container-fluid vh-100 text-secondary">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-md-4">
      <h1>Inventory System</h1>
    </div>
    <div class="col-md-3">
      <div class="p-4 shadow-lg position-relative">
        <?php echo $_SESSION['loginErrorHand'] ?? '' ?>
        <form method="POST">
        <div class="form-group m-2 ">
        <input class="form-control loginFormsInput" type="text" name="uname" value="" placeholder="Username">
        </div>
        <div class="form-group mb-12">
        <input  class="form-control loginFormsInput" type="password" name="pword" value="" placeholder="Password">
        </div>
        <div class="form-group">
          <button type="submit" name="login" class="btn btn-block cs_btnAdd">login</button>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>
