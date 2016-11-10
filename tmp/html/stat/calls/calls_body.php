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
	    <div class="row">
            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="box box-danger">
                    <div class="box-header with-border">
					      <h3 class="box-title">
	  Статистика звонков</h3>
	  <div class="box-tools pull-right">
	  <div class="input-group input-group-sm"><input class="date_f form-control" style="display:block;float:left;width:30%;" id="datepicker1" placeholder="С" /> <input class="date_e form-control" style="display:block;float:left; width:30%;" id="datepicker2" placeholder="По" /><span style="float:left; display: block;" class="input-group-btn"><button type="button" id="select_stat" class="btn btn-info btn-flat">Сформировать</button></span></div>
	  </div></div></div></div></div>
 
    </section>
	
	<div id="load_stat">
    <!-- Main content -->
	  <?php require_once('calls_table.php'); ?>
    <!-- /.content -->
	</div>
  </div>
  <!-- /.content-wrapper -->