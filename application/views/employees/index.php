<!-- application/views/employees/index.php -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Employees List</h3>
    <div class="box-tools pull-right">
      <a href="<?php echo site_url('employees/create'); ?>" class="btn btn-primary btn-sm">
        <i class="fa fa-plus"></i> Add New Employee
      </a>
    </div>
  </div>
  <div class="box-body">
    <table id="employees-table" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Department</th>
          <th>Position</th>
          <th>Hire Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($employees as $employee): ?>
        <tr>
          <td><?php echo $employee->firstname . ' ' . $employee->lastname; ?></td>
          <td><?php echo $employee->email; ?></td>
          <td><?php echo $employee->phone; ?></td>
          <td><?php echo $employee->department; ?></td>
          <td><?php echo $employee->position; ?></td>
          <td>
            <a href="<?php echo site_url('employees/edit/'.$employee->id); ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-edit"></i> Edit
            </a>
            <a href="<?php echo site_url('employees/delete/'.$employee->id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this employee?');">
              <i class="fa fa-trash"></i> Delete
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
$(document).ready(function() {
    $('#employees-table').DataTable();
});
</script>
