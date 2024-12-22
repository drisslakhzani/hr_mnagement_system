<div class="box">
  <form action="<?php echo site_url('users/edit/'.$user->id); ?>" method="post">
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
            <input type="text" name="firstname" class="form-control" required value="<?php echo $user->firstname; ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastname" class="form-control" required value="<?php echo $user->lastname; ?>">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Login</label>
            <input type="text" class="form-control" value="<?php echo $user->login; ?>" disabled>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>New Password</label>
            <input type="password" name="password" class="form-control">
            <small class="text-muted">Leave blank to keep current password</small>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Role</label>
        <select name="role" class="form-control" required>
          <option value="Admin" <?php echo $user->role === 'Admin' ? 'selected' : ''; ?>>Admin</option>
          <option value="User" <?php echo $user->role === 'User' ? 'selected' : ''; ?>>User</option>
        </select>
      </div>
    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="<?php echo site_url('users'); ?>" class="btn btn-default">Cancel</a>
    </div>
  </form>
</div>
