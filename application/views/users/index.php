<!-- application/views/users/index.php -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Users List</h3>
    <div class="box-tools pull-right">
      <a href="<?php echo site_url('users/create'); ?>" class="btn btn-primary btn-sm">
        <i class="fa fa-plus"></i> Add New User
      </a>
    </div>
  </div>
  <div class="box-body">
    <table id="users-table" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Login</th>
          <th>Role</th>
          <th>Created</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($users as $user): ?>
        <tr>
          <td><?php echo $user->firstname . ' ' . $user->lastname; ?></td>
          <td><?php echo $user->login; ?></td>
          <td><span class="label label-<?php echo $user->role === 'Admin' ? 'danger' : 'primary'; ?>"><?php echo $user->role; ?></span></td>
          <td><?php echo date('Y-m-d', strtotime($user->created_at)); ?></td>
          <td>
            <a href="<?php echo site_url('users/edit/'.$user->id); ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-edit"></i> Edit
            </a>
            <?php if($user->id != $this->session->userdata('user_id')): ?>
            <a href="<?php echo site_url('users/delete/'.$user->id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this user?');">
              <i class="fa fa-trash"></i> Delete
            </a>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
$(document).ready(function() {
    $('#users-table').DataTable();
});
</script>
