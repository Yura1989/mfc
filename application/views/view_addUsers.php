    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">Добавление пользователей</span>
                </h1>
                <p class="title-bar-description">
                    <small>Для добавления пользователя, заполните ниже поля</small>
                </p>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="demo-form-wrapper">
                        <form method="POST" action="<?=base_url();?>home/addUser" enctype="multipart/form-data">
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <span class="icon icon-info-circle icon-lg"></span>
                                <small>Заполните ниже поле, если пользователь с таким nickname существует, система оповестит Вас</small>
                            </div>
                            <div class="form-group">
                                <label for="nickname" class="control-label">Nickname</label>
                                <input id="nickname" class="form-control" type="text" name="nickname" required value="<?php echo set_value('nickname');?>" >
                                <small class="help-block">Введи Ваш nickname для входа в систему</small>
                                <small><?php echo form_error('nickname'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label">Имя пользователя</label>
                                <input id="name" class="form-control" type="text" name="name" required value="<?php echo set_value('name');?>">
                                <small class="help-block">Введи Ваше Имя</small>
                                <small><?php echo form_error('name'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="sername" class="control-label">Фамилия пользователя</label>
                                <input id="sername" class="form-control" type="text" name="sername" required value="<?php echo set_value('sername');?>">
                                <small class="help-block">Введи Вашу Фамилию</small>
                                <small><?php echo form_error('sername'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="email-1" class="control-label">Email</label>
                                <input id="email-1" class="form-control" type="email" name="email" required value="<?php echo set_value('email');?>">
                                <small class="help-block">Введи Ваш Email</small>
                                <small><?php echo form_error('email'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Пароль</label>
                                <input id="password" class="form-control" type="password" name="password" autocomplete="off" required>
                                <small class="help-block">Введите Ваш пароль</small>
                                <small><?php echo form_error('password'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="repassword" class="control-label">Повторите пароль</label>
                                <input id="repassword" class="form-control" type="password" name="repassword" autocomplete="off" required>
                                <small class="help-block">Повторите Ваш пароль</small>
                                <small><?php echo form_error('repassword'); ?></small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Добавить пользователя</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>