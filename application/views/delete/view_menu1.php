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
                            <a href="messenger.html" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-comments"></span>
                                <span class="sidenav-label">SMS-сообщения</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">SMS-сообщения</li>
                                <li><a href="<?=base_url();?>home/sendSms">Отправка одного SMS-сообщение</a></li>
                                <li><a href="<?=base_url();?>home/sendManySms">Отправка нескольких SMS-сообщение</a></li>
                                <li><a href="dashboard-2.html">Проверка доставки</a></li>
                            </ul>
                        </li>

                        <li class="sidenav-item">
                            <a href="#" >
                                <span class="sidenav-icon icon icon-list"></span>
                                <span class="sidenav-label">История отправки</span>
                            </a>
                        </li>

                        <li class="sidenav-item">
                            <a href="#" >
                                <span class="sidenav-icon icon icon-briefcase"></span>
                                <span class="sidenav-label">Просмотр баланса</span>
                            </a>
                        </li>

                        <li class="sidenav-item has-subnav">
                            <a href="contacts.html"  aria-haspopup="true">
                                <span class="sidenav-icon icon icon-users"></span>
                                <span class="sidenav-label">Пользователи</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Пользователи</li>
                                <li><a href="<?=base_url();?>home/addUser">Добавить пользователя</a></li>
                                <li><a href="<?=base_url();?>home/users">Просмотр пользователей</a></li>
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
                                <span class="sidenav-label">ПК_ПВД</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    

