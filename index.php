<?php include_once('tmp/html/login/header.php'); 
session_start();
if(!empty($_SESSION['result']['id'])) {
header('location:profile.php');
}
?>
<div class="login-box">
  <div class="login-logo">
    <b>Панель</b> управления
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Авторизируйтесь, чтобы начать работу</p>
	<p class="bg-info" id="msg"><?php echo (isset($_SESSION['msg'])) ? $_SESSION['msg'] : ''; ?></p>
    <form role="form" id="loginForm" method="post" action="function.php?type=login">
      <div class="form-group has-feedback">
        <input type="text" name="username" required="required" class="form-control" placeholder="Login">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" required="required" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Войти</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
 <?php include_once('tmp/html/login/footer.php'); ?>

