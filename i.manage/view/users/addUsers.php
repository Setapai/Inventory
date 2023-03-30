
<!-- Header -->
<div class="row">
  <div class="col-md-12 text-secondary">
    <h4><span>
      <a href="?users" class="text-info" >
        <i class="bi bi-arrow-bar-left"></i>
      </a>
    </span>Add Users</h4>
    <hr>
  </div>
</div>
<!-- Body -->
<div class="row">
  <div class="col-md-12 card">
    <form action="?users" method="post" class="m-2 p-4">
      <div class="row">

        <div class="col">
          <!-- Status -->
          <div class="m-2 ">
            <label>Status</label>
            <select required class="form-control" name="status">
              <option selected hidden disabled value="">Select Status</option>
              <option value="Employee">Employee</option>
              <option value="Admin">Admin</option>
            </select>
          </div>
          <!-- username -->
          <div class="m-2">
            <label>Username</label>
            <input  class="form-control" type="text" name="uName" value="" placeholder="Username" autocomplete="off" required>
          </div>
          <!-- email -->
          <div class="m-2">
            <label>email</label>
            <input  class="form-control" type="text" name="email" value="" placeholder="Email" autocomplete="off" required>
          </div>
          <!-- password -->
          <div class="m-2">
            <label>Password</label>
            <input class="form-control" type="text" value="" placeholder="Password" autocomplete="off"  required>
          </div>
          <!-- confirm password -->
          <div class="m-2">
            <label>Confirm Password</label>
            <input class="form-control" type="password" name="pWord" value="" autocomplete="off" placeholder="Confirm Password" required>
          </div>
        </div>
      <div class="col">
          <!-- first name -->
          <div class="m-2">
            <label>First name</label>
            <input class="form-control" type="text" name="fName" value="" placeholder="First Name" autocomplete="off" required>
          </div>
          <!-- last name -->
          <div class="m-2">
            <label>Last name</label>
            <input class="form-control" type="text" name="lName" value="" placeholder="Last Name" autocomplete="off" required>
          </div>
          <!-- phone number -->
          <div class="m-2">
            <label>Phone number</label>
            <input class="form-control" type="text" maxlength="11" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="pNum" value="" placeholder="Phone Number" autocomplete="off"  required>
          </div>
          <!-- gender -->
          <div class="m-2">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" required>
              <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" required>
              <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
          </div>
          <hr>
          <div class="row m-2">
            <div class="col-md-12">
              <div class="row justify-content-end align-item-end">
                <div class="m-2">
                  <button type="submit" name="addUser" class="btn cs_btnAdd">Save User <i class="bi bi-person-check-fill"></i></button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>
