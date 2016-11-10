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
					require_once('tmp/html/nav.php');  # Разделы системы
				?>
            </section>
        </aside>

        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Звонки</h3>
                                <div class="box-tools pull-right">
                                    <button id="today" type="button" class="btn btn-box-tool btn-sm">Сегодня</button>
                                    <button id="week" type="button" class="btn btn-box-tool btn-sm">Неделя</button>
                                    <button id="month" type="button" class="btn btn-box-tool btn-sm">Месяц</button>
                                    <small><input class="datev" id="datepicker" placeholder="Выбрать дату" /></small>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="change_timeline">
                                    <div class="box-body no-padding">
                                        <?php 
											tl_call_today(); # Выводим основную информацию о звонках за сегодня
										?>
                                            <table id="date_sel"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Запись клиентов</h3>
                                <div class="box-tools pull-right">
                                    <button id="today_ce" type="button" class="btn btn-box-tool btn-sm">Сегодня</button>
                                    <button id="week_ce" type="button" class="btn btn-box-tool btn-sm">Неделя</button>
                                    <button id="month_ce" type="button" class="btn btn-box-tool btn-sm">Месяц</button>
                                    <small><input class="datev_ce" id="datepicker_ce" placeholder="Выбрать дату" /></small>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="change_timeline">
                                    <div class="box-body no-padding">
                                        <?php 
											tl_ce_today(); # Выводим основную информацию о звонках за сегодня
										?>
                                            <table id="date_ce"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Новые клиенты</h3>
                                <div class="box-tools pull-right">
                                    <button id="today_client" type="button" class="btn btn-box-tool btn-sm">Сегодня</button>
                                    <button id="week_client" type="button" class="btn btn-box-tool btn-sm">Неделя</button>
                                    <button id="month_client" type="button" class="btn btn-box-tool btn-sm">Месяц</button>
                                    <small><input class="datev_client" id="datepicker_client" placeholder="Выбрать дату" /></small>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="change_timeline">
                                    <div class="box-body no-padding">
                                        <?php 
											tl_client_today(); # Выводим основную информацию о звонках за сегодня
										?>
                                            <table id="date_client"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>