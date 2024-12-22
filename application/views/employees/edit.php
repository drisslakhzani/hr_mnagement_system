<div class="box">
  <form action="<?php echo site_url('employees/edit/'.$employee->id); ?>" method="post">
    <div class="box-body">
      <?php if(validation_errors()): ?>
        <div class="alert alert-danger">
          <?php echo validation_errors(); ?>
        </div>
      <?php endif; ?>
      
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="firstname" class="form-control" required value="<?php echo $employee->firstname; ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastname" class="form-control" required value="<?php echo $employee->lastname; ?>">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="<?php echo $employee->email; ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $employee->phone; ?>">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Department</label>
            <input type="text" name="department" class="form-control" required value="<?php echo $employee->department; ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" class="form-control" required value="<?php echo $employee->position; ?>">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Hire Date</label>
        <input type="date" name="hire_date" class="form-control" required value="<?php echo $employee->hire_date; ?>">
      </div>
    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="<?php echo site_url('employees'); ?>" class="btn btn-default">Cancel</a>
    </div>
  </form>
</div>
