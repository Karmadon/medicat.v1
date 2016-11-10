<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">

    <!-- Logo -->
    <a href="/profile" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ADM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Панель</b> управления</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="user user-menu">
            <a href="function.php?type=logout" class="bg-navy-active color-palette">Выход</a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
	  <?php require_once('tmp/html/conn.php'); ?>
	  <?php require_once('tmp/html/user.php'); ?>
	  <?php require_once('tmp/html/nav.php'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>Удаление элемента</h1>
      <ol class="breadcrumb">
        <li><a href="/profile"><i class="fa fa-dashboard"></i> Главная</a></li>
		<li><a href="/admin?type=sprav">Справочники</a></li>
		<li class="active">Удаление элемента "Телефон"</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	  <?php session_start();
			require_once('classes/userClass.php');
			$userObj = new USER();
			$userInfo = $userObj->getUserById($_SESSION['result']['id']);
			$manager = $userInfo['result']['id'];

			$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
			$resultid = $conn->query($sqlid);
			$rowid = $resultid->fetch_assoc();
	  if ($rowid["groupd_id"] =='1') {
	  require_once('sprav_table.php'); 
	  }
	  else{echo '<div class="box-body">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Внимание!</h4>
                Вы не имеете прав доступа, на просмотр этого ресурса.
              </div>
            </div>';}
	  ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->