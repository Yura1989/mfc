<!--Главное меню-->
<div class="layout-main">
    <div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
            <div class="custom-scrollbar">
                <nav id="sidenav" class="sidenav-collapse collapse">
                    <ul class="sidenav">
                        <li class="sidenav-search hidden-md hidden-lg">
                            <form class="sidenav-form" action="/">
                                <div class="form-group form-group-sm">
                                    <div class="input-with-icon">
                                        <input class="form-control" type="text" placeholder="Search…">
                                        <span class="icon icon-search input-icon"></span>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li class="sidenav-heading">Навигация</li>
                        <li class="sidenav-item has-subnav">
                            <a href="<?=base_url();?>Home/sendSms" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-comments"></span>
                                <span class="sidenav-label">SMS-сообщения</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">SMS-сообщения</li>
                                <li><a href="<?=base_url();?>Home/sendSms">Отправка SMS-сообщение</a></li>
                                <li><a href="<?=base_url();?>Home/hystory">История отправки</a></li>
                                <li><a href="<?=base_url();?>Home/transfer">Поиск номера и проверка доставки</a></li>
                                <li><a href="<?=base_url();?>Home/balance">Просмотр баланса</a></li>
                            </ul>
                        </li>

                        <li class="sidenav-item has-subnav">
                            <a href="contacts.html"  aria-haspopup="true">
                                <span class="sidenav-icon icon icon-users"></span>
                                <span class="sidenav-label">Пользователи</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Пользователи</li>
                                <li><a href="<?=base_url();?>Home/addUser">Добавить пользователя</a></li>
                                <li><a href="<?=base_url();?>Home/users">Просмотр пользователей</a></li>
                            </ul>
                        </li>

                        <li class="sidenav-item">
                            <a href="profile.html">
                                <span class="sidenav-icon icon icon-user"></span>
                                <span class="sidenav-label">Профайл</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="<?=base_url();?>home/connectOracle">
                                <span class="sidenav-icon icon icon-user"></span>
                                <span class="sidenav-label">Настройки</span>
                            </a>
                        </li>
                        <!--Система отчетов-->
                        <li class="sidenav-item has-subnav">
                            <a href="<?=base_url();?>home/rangeReport"  aria-haspopup="true">
                                <span class="sidenav-icon icon icon-users"></span>
                                <span class="sidenav-label">Отчеты</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Отчеты</li>
<!--                                <li><a href="--><?//=base_url();?><!--home/report">Отчет1</a></li>-->
                                <li><a href="<?=base_url();?>home/rangeReport">Отчет</a></li>
                                <li><a href="<?=base_url();?>home/exportExcel">Экспорт в Excel</a></li>
                            </ul>
                        </li>
                        <!--Система настройки ведомств и услуг-->
                        <li class="sidenav-item has-subnav">
                            <a href="<?=base_url();?>home/service"  aria-haspopup="true">
                                <span class="sidenav-icon icon icon-users"></span>
                                <span class="sidenav-label">Настройка отчетов</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Настройка отчетов</li>
                                <li><a href="<?=base_url();?>home/service">Справочник услуг</a></li>
                                <li><a href="<?=base_url();?>home/department">Справочник ведомств</a></li>
                                <li><a href="<?=base_url();?>home/typeDep">Справочник Типы ведомств</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    

