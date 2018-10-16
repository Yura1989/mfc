    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <?php foreach ($user as $item): ?>
                    <span class="d-ib">Изменение данных пользователя <?php echo $item['nickname']?></span>
                    <?php endforeach ?>
                </h1>
            </div>
            <div class="row p-y-lg">
                <div class="col-md-6 col-md-offset-3">
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <span class="icon icon-info-circle icon-lg"></span>
                        <small>Измените данные пользователя, после этого нажмите кнопку "Сохранить"</small>
                    </div>
                    <?php foreach ($user as $item): ?>
                    <form data-toggle="md-validator" method="POST" action="<?=base_url();?>home/editUser?<?php echo "user_id=".$item['id'] ?>">
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="text" name="nickname" spellcheck="false" required value="<?php echo $item['nickname']; ?>">
                            <label class="md-control-label"><?php echo $item['nickname']; ?></label>
                            <small class="md-help-block">Nickname должен быть уникальным</small>
                            <small><?php echo form_error('nickname'); ?></small>
                        </div>
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="text" name="name" spellcheck="false" required value="<?php echo $item['name']; ?>">
                            <label class="md-control-label"><?php echo $item['name']; ?></label>
                            <small class="md-help-block">Имя пользователя</small>
                            <small><?php echo form_error('name'); ?></small>
                        </div>
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="text" name="sername" spellcheck="false" required value="<?php echo $item['sername']; ?>">
                            <label class="md-control-label"><?php echo $item['sername']; ?></label>
                            <small class="md-help-block">Фамилия пользователя</small>
                            <small><?php echo form_error('sername'); ?></small>
                        </div>
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="email" name="email" spellcheck="false" autocomplete="off" required value="<?php echo $item['email']; ?>">
                            <label class="md-control-label"><?php echo $item['email']; ?></label>
                            <small class="md-help-block">Email</small>
                            <small><?php echo form_error('email'); ?></small>
                        </div>
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="password" name="password" spellcheck="false" required>
                            <label class="md-control-label"></label>
                            <small class="md-help-block">Новый пароль</small>
                            <small><?php echo form_error('password'); ?></small>
                        </div>
                        <div class="md-form-group md-label-floating">
                            <input class="md-form-control" type="password" name="repassword" spellcheck="false" required>
                            <label class="md-control-label"></label>
                            <small class="md-help-block">Повторите новый пароль</small>
                            <small><?php echo form_error('repassword'); ?></small>
                        </div>
                        <button type="submit" name="editUser" class="btn btn-primary btn-block">Сохранить</button>
                    </form>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>