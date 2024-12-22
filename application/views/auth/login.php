<!-- application/views/auth/login.php -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HR Management | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>HR</b>Management
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <?php if($this->session->flashdata('error')): ?>
      <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
      </div>
    <?php endif; ?>
    <form action="<?php echo site_url('auth/login'); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Login" name="login" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
</body>
</html>
