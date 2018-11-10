<script src="<?= base_url();?>assets/js/jquery.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery(function($) {
        $.mask.definitions['~']='[+-]';
        $('#number').mask('8 (999) 999-99-99');
    });
</script>
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="d-ib">Отправка SMS-сообщения</span>
            </h1>
            <p class="title-bar-description">
                <small>Для отправки SMS-сообщения заполните ниже форму</small>
            </p>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="demo-form-wrapper">
                    <form id="demo-inputmask" class="form-horizontal"  method="POST" action="<?=base_url();?>Home/sendSms">
                        <div class="form-group">
                            <label class=" control-label" for="number">Телефон</label>
                                <input id="number" class="form-control" name="number" required type="text"placeholder="8 (___) ___-__-__">
                                <span class="help-block">Введите номер мобильного телефона</span>
                                <?php if (isset ($description['error'])) { ?>
                                    <script> alert ("Смс не отправлено, ошибка: <?php echo ($description['error']); ?> "); </script>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="send" class="btn btn-primary btn-block">Отправить сообщение</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>