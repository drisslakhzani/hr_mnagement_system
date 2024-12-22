<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $total_employees; ?></h3>
                <p>Total Employees</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo site_url('employees'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
    <?php if($this->session->userdata('role') === 'Admin'): ?>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $total_users; ?></h3>
                <p>System Users</p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <a href="<?php echo site_url('users'); ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <?php endif; ?>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Recent Employees</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Hire Date</th>
                    </tr>
                    <?php foreach($recent_employees as $employee): ?>
                    <tr>
                        <td><?php echo $employee->firstname . ' ' . $employee->lastname; ?></td>
                        <td><?php echo $employee->department; ?></td>
                        <td><?php echo $employee->position; ?></td>
                        <td><?php echo $employee->hire_date; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="box-footer clearfix">
                <a href="<?php echo site_url('employees'); ?>" class="btn btn-sm btn-default btn-flat pull-right">View All Employees</a>
            </div>
        </div>
    </div>
</div>

