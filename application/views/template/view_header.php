<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Система МАУ "МФЦ" г.Югорск</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url();?>assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url();?>assets/img/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?= base_url();?>assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/vendor.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/elephant.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/application.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/demo.min.css">

</head>

<body class="layout layout-header-fixed">
<div class="layout-header">
    <div class="navbar navbar-default">
        <!--логотип-->
        <div class="navbar-header">
            <a class="navbar-brand navbar-brand-center" href="<?=base_url();?>">
                <img class="navbar-brand-logo" src="<?= base_url();?>assets/img/logo.png" alt="МАУ МФЦ">
            </a>
            <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
                <span class="sr-only">Toggle navigation</span>
            <span class="bars">
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
            </span>
            <span class="bars bars-x">
              <span class="bar-line bar-line-4"></span>
              <span class="bar-line bar-line-5"></span>
            </span>
            </button>
            <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="arrow-up"></span>

            </button>
        </div>

        <!--Голова с кнопкой своричивания меню и инфой о пользователе-->
        <div class="navbar-toggleable">
            <nav id="navbar" class="navbar-collapse collapse">
                <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
                    <span class="sr-only">Toggle navigation</span>
              <span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span>
              </span>
                </button>
                <!--Информация о пользователе-->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown hidden-xs">
                        <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
                            <img class="rounded" width="36" height="36" src="<?=base_url();?>assets/img/user.jpg" alt="Teddy Wilson">
                            <?php if (isset ($_COOKIE['current_nickname']))
                            {
                                echo $_COOKIE['current_nickname'];
                            } else {
                                echo "User";
                            } ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="navbar-upgrade-version">Version: 1.0.0</li>
                            <li class="divider"></li>
                            <li><a href="profile.html">Профайл</a></li>
                            <li><a href="login-1.html">Выйти</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

