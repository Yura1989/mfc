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
                <span class="d-ib">Система МАУ "МФЦ"</span>
            </h1>
            <p class="title-bar-description">
                <small>Поиск телефона и проверка доставки</small>
            </p>
            <div class="row">
                <div class="col-xs-4">
                    <div class="panel panel-body text-left" data-toggle="match-height">
                        <form method="POST" action="<?= base_url(); ?>Home/transfer">
                            <div class="form-group">
                                <label class=" control-label" for="number">Телефон</label>
                                <input id="number" class="form-control" autocomplete="off" name="number" required type="text"placeholder="8 (___) ___-__-__">
                            </div>
                            <div class="form-group">
                                <button id="btn_export" class="btn btn-success" type="submit" name="send">Поиск телефона</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
