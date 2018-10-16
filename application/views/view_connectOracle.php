
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="d-ib">Подключение в базе данных ПК-ПВД</span>
            </h1>
            <p class="title-bar-description">
                <small><?php echo ($_COOKIE['current_nickname']);?> Добро пожаловать! </small>
            </p>
        </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="demo-form-wrapper">
                        <form class="form form-horizontal" method="POST" action="<?=base_url();?>connectOracle">
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <span class="icon icon-info-circle icon-lg"></span>
                                <small>Заполните ниже поля, пример строки подключения: 192.168.1.1/XE</small>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="connect">Строка подключения</label>
                                <div class="col-sm-9">
                                    <input id="connect" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="nickname">Имя пользователя</label>
                                <div class="col-sm-9">
                                    <input id="nicknameOracle" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="password">Пароль</label>
                                <div class="col-sm-9">
                                    <input id="passwordOracle" class="form-control" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <button name="connectOracle" type="submit" class="btn btn-primary btn-block">Проверить соединение</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
    </div>
</div>
</div>
