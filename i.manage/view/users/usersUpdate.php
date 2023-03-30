<!-- Header -->
<div class="row">
  <div class="col-md-12 text-secondary">
    <h4><span>
      <a href="?users" class="text-info" >
        <i class="bi bi-arrow-bar-left"></i>
      </a>
    </span>Update Users</h4>
    <hr>
  </div>
</div>
<!-- Body -->
<div class="row text-secondary">
  <div class="col-md-12 card">
    <form action="?users" method="post" class="m-2 p-4">
      <div class="row">
        <div class="col">
          <!-- Status -->
          <div class="m-2 ">
            <label>Status</label>
            <select class="form-control" name="status" required>
              <option selected hidden value=<?php echo $_SESSION['status']; ?>  > <?php echo $_SESSION['status']; ?></option>
              <option value="Staff">Staff</option>
              <option value="Admin">Admin</option>
            </select>
          </div>
          <!-- username -->
          <div class="m-2">
            <label>Username</label>
            <input  class="form-control" type="text" name="uName" value="<?php echo $_SESSION['uname']; ?>" placeholder="Username" required>
          </div>
          <!-- email -->
          <div class="m-2">
            <label>email</label>
            <input  class="form-control" type="text" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Email"  required>
          </div>
          <!-- password -->
          <div class="m-2">
            <label>Password</label>
            <input class="form-control" type="text" value="<?php echo $_SESSION['pword']; ?>" placeholder="Password" required>
          </div>
          <!-- confirm password -->
          <div class="m-2">
            <label>Confirm Password</label>
            <input class="form-control" type="password" name="pWord" value="<?php echo $_SESSION['pword']; ?>" placeholder="Confirm Password" required>
          </div>
        </div>
      <div class="col">
          <!-- first name -->
          <div class="m-2">
            <label>First name</label>
            <input class="form-control" type="text" name="fName" value="<?php echo $_SESSION['fname']; ?>" placeholder="First Name"  required>
          </div>
          <!-- last name -->
          <div class="m-2">
            <label>Last name</label>
            <input class="form-control" type="text" name="lName" value="<?php echo $_SESSION['lname']; ?>" placeholder="Last Name" required>
          </div>
          <!-- phone number -->
          <div class="m-2">
            <label>Phone number</label>
            <input class="form-control" type="text"  maxlength="11" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"  name="pNum" value="<?php echo $_SESSION['pnum']; ?>" placeholder="Phone Number"  required>
          </div>
          <!-- gender -->
          <div class="m-2">
            <div class="form-check form-check-inline">
              <input <?php if ($_SESSION['gender'] == 'male'): ?>
                checked
              <?php endif; ?>  class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" required>
              <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input  <?php if ($_SESSION['gender'] == 'female'): ?>
                checked
              <?php endif; ?> class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" required>
              <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
          </div>
          <hr>
          <div class="row m-2">
            <div class="col-md-12">
              <div class="row justify-content-end align-item-end">
                <div class="m-2">
                  <button type="submit" name="saveUsersUpdate" class="btn cs_btnAdd">Save Changes <i class="bi bi-person-check-fill"></i></button>
                </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    </form>
  </div>
</div>
