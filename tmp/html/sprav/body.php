<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">

            <a href="/profile" class="logo">
                <span class="logo-mini"><b>ADM</b></span>
                <span class="logo-lg"><b>Панель</b> управления</span>
            </a>

            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="user user-menu">
                            <a href="function.php?type=logout" class="bg-navy-active color-palette">Выход</a>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <?php
				/* Подключаем файлы вывода информации */
					require_once('tmp/html/user.php');   # Подключенный в систему пользователь 
					require_once('tmp/html/nav.php');    # Разделы системы
				?>
            </section>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>Справочники</h1>
                <ol class="breadcrumb">
                    <li><a href="/profile"><i class="fa fa-dashboard"></i> Главная</a></li>
                    <li class="active"><i class="fa fa-dashboard"></i> Справочники</li>
                </ol>
            </section>
            <section class="content">
                <?php
					$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
					$resultid = $conn->query($sqlid);
					$rowid = $resultid->fetch_assoc();
					if ($rowid["groupd_id"] =='1') {
						require_once('sprav_table.php'); 
					}
					else {
						echo '
							<div class="box-body">
								<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-ban"></i> Внимание!</h4>
									Вы не имеете прав доступа, на просмотр этого ресурса.
								</div>
							</div>
							';
						}
	  ?>
            </section>
        </div>