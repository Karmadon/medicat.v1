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
                  require_once('tmp/html/user.php'); # Подключенный в систему пользователь 
                  require_once('tmp/html/nav.php'); # Разделы системы
				?>
            </section>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Действия</h1>
                <ol class="breadcrumb">
                    <li><a href="/profile"><i class="fa fa-dashboard"></i> Главная</a></li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Клиенты</span>
                                <p><a href="new_client"><i class="fa fa-arrow-circle-right"></i> Новый клиент</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-telephone-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Звонки</span>
                                <p><a href="new_call"><i class="fa fa-arrow-circle-right"></i> Новый звонок</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix visible-sm-block"></div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="ion ion-ios-plus-outline"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Запись</span>
                                <p><a href="new_ce"><i class="fa fa-arrow-circle-right"></i> Новая запись</a></p>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-7">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Задачи</h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
								</div>
							</div>
							<div class="box-body no-padding">
								<div id="calendar"></div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
					<?php 
					$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
					$resultid = $conn->query($sqlid);
					$rowid = $resultid->fetch_assoc();
					if ($rowid["groupd_id"] =='101') {

					echo'
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Список событий</h3>
								<div class="box-tools pull-right">
									<button id="today_ce" type="button" class="btn btn-box-tool btn-sm">Сегодня</button>
                                    <button id="week_ce" type="button" class="btn btn-box-tool btn-sm">Неделя</button>
                                    <button id="month_ce" type="button" class="btn btn-box-tool btn-sm">Месяц</button>
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
								</div>
							</div>
							<div class="box-body no-padding">
							<table id="date_ce" class="table table-striped">
							<tr>
							<td>Статус</td>
							<td>Дата</td>
							<td>Время</td>
							<td>Клиент</td>
							<td>Подробнее</td>
							</tr>';
						
								main_day();
							
							echo'</table>
							</div>
						</div>';
						}
						else {
						echo'
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Список событий</h3>
								<div class="box-tools pull-right">
									<button id="today" type="button" class="btn btn-box-tool btn-sm">Сегодня</button>
                                    <button id="week" type="button" class="btn btn-box-tool btn-sm">Неделя</button>
                                    <button id="month" type="button" class="btn btn-box-tool btn-sm">Месяц</button>
                                    <small><input class="datev" id="datepicker" placeholder="Выбрать дату" /></small>
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
							</div>
							<div class="box-body no-padding">
							<table id="date_sel" class="table table-striped">
							<tr>
							<td>Статус</td>
							<td>Дата</td>
							<td>Время</td>
							<td>Клиент</td>
							<td>Подробнее</td>
							</tr>';
						
								main_day_all();
							
							echo'</table>
							</div>
						</div>';	
						}
						?>
						
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Группа повтора</h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
								</div>
							</div>
							<div class="box-body no-padding">
							<table class="table table-striped">
							<tr>
							<td>Напоминание</td>
							<td>Дата</td>
							<td>Клиент</td>
							<td>Статус</td>
							</tr>
								<?php
								main_repeat();
								?>
							</table>
							</div>
						</div>
					</div>
				</div>
            </section>
        </div>