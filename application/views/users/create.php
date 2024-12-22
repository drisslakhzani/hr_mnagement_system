<div class="box">
  <form action="<?php echo site_url('users/create'); ?>" method="post">
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
            <input type="text" name="firstname" class="form-control" required value="<?php echo set_value('firstname'); ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastname" class="form-control" required value="<?php echo set_value('lastname'); ?>">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Login</label>
            <input type="text" name="login" class="form-control" required value="<?php echo set_value('login'); ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            <small class="text-muted">Minimum 6 characters</small>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Role</label>
        <select name="role" class="form-control" required>
          <option value="">Select Role</option>
          <option value="Admin" <?php echo set_select('role', 'Admin'); ?>>Admin</option>
          <option value="User" <?php echo set_select('role', 'User'); ?>>User</option>
        </select>
      </div>
    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="<?php echo site_url('users'); ?>" class="btn btn-default">Cancel</a>
    </div>
  </form>
</div>
