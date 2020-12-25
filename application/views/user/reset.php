<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0)"><b><?php echo SITE_NAME; ?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <?php echo $this->session->flashdata('response');?>
    <p class="login-box-msg">Forgot Password <?php echo SITE_NAME; ?></p>

    <?php echo form_open('user/reset'); ?>

      <div class="form-group has-feedback">
        <?php echo form_error('password'); ?>
        <input type="password" required class="form-control" placeholder="Password" name="password" id="password" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <?php echo form_error('cpassword'); ?>
        <input type="password" required class="form-control" placeholder="Confirm Password" name="cpassword" id="cpassword" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="row">
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
        </div>
        <a href="<?php echo base_url('user/login');?>">Login</a><br>
      </div>
    <?php echo form_close(); ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>