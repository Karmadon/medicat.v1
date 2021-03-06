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
                <h1>
        Запись клиентов
      </h1>
                <ol class="breadcrumb">
                    <li><a href="/profile"><i class="fa fa-dashboard"></i> Главная</a></li>
                    <li class="active">Запись клиентов</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="ion ion-ios-plus-outline"></i></span>

                            <div class="info-box-content">
                                <p><a href="new_ce"><i class="fa fa-arrow-circle-right"></i> Новая запись</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
					ce(); # Выводим основную информацию
				?>
            </section>
        </div>