

  <?php include '../header.php';?>

  <div class="contents">
  	<h6 style="padding: 6px;">Register</h6>
  <div class="content_reg">
  	
  	<div class="content_reg_form">
    
    <form action="../backend/client.php" class="was-validated" method="post">
      <?php include '../backend/error.php'; ?>
      <div class="form-group">
        <label for="fname">Firstname:</label>
        <input type="text" class="form-control" id="uname" placeholder="Enter first name" name="fname" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-group">
        <label for="lname">Lastname:</label>
        <input type="text" class="form-control" id="uname" placeholder="Enter lastname" name="lname" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

  <div class="form-group">
        <label for="email">Username:</label>
        <input type="text" class="form-control" id="uname" placeholder="Enter User name" name="uname" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>

      <div class="form-group">
        <label for="region">Position:</label>
      <select  class="custom-select" name="position" required>
      <option selected>select position</option>	
    <option value="manager">Manager</option>
    <option value="sales">Sales</option>
    <option value="finance">Finance</option>
     <option value="walfare">Walfare</option>
     <option value="C.E.O">C.E.O</option>
     <option value="assistant manager">Assistant Manager</option>
     </select>
      </div>

    <div class="form-group form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="gender"  value="Male"> Male.
         
        </label>
      </div>

      <div class="form-group form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="gender" value="Female"> Female.
        </label>
      </div>

      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
    
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    </div>
  </div>
  </div>
  <?php include '../forter.php';?>